<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;


    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'is_accepted'
    ];


    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }


    // Static method to count articles to be revised
    public static function toBeRevisedCount()
    {
        return Article::where('is_accepted', null)->count();
    }


    /* TNTsearch per funzionare fa una indicizzazione degli oggetti presenti nel database relativi al modello che vogliamo rendere ricercabile.
        Questa funzione è utilizzata per convertire un'istanza di modello Eloquent in un array 
        che può essere indicizzato da un motore di ricerca full-text. */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category // stiamo richiamando la funzione di relazione con Category, non il nome di una colonna nella tabella.
        ];
    }


    // Define relationships
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Category
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
