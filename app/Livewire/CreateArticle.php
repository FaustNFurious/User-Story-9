<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{

    // Per gestire l'upload delle immagini
    use WithFileUploads;

    /* l'attributo #[Validate] consente di definire le regole di validazione direttamente sulle proprietà di un componente. 
    Questo permette di effettuare la validazione in tempo reale, ovvero non appena l'utente modifica il valore di una proprietà. */
    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string|min:10|max:1000')]
    public $description;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|exists:categories,id')]
    public $category = null;

    public $article;


    // Store new article
    public function store() 
    {

        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        // Gestione delle immagini
        if (count($this->images) > 0) {

            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                /* Vecchio codice prima dell'aggiunta del job RemoveFaces */
                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));

                /* Nuovo codice con l'aggiunta del job RemoveFaces */
                /* il metodo withChain() serve ad avviare una serie di job concatenati, 
                   creando una sequenza in cui il completamento di un job innesca l'esecuzione del successivo. */
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            // Pulizia della cartella temporanea
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        // Redirect alla dashboard con messaggio di successo
        return redirect()->route('dashboard')->with('success', 'Articolo "' . $this->article->title . '" creato con successo!');

    }

    // Per gestire le immagini caricate
    public $images = [];
    public $temporary_images;

    public function updatedTemporaryImages()
    {

        if ($this->validate([
            'temporary_images.*' => 'image|max:5120', // 5MB Max per immagine
            'temporary_images' => 'max:5'             // Massimo 5 immagini
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }    

    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function render()
    {
        return view('livewire.create-article');
    }

}
