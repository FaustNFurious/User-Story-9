<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    private $article_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $i = Image::find($this->article_image_id);

        if (!$i) {
            return;
        }

        // file_get_contents ritorna il contenuto del file come stringa
        $image = file_get_contents(storage_path('app/public/' . $i->path));
        /* viene poi impostata una variabile di ambiente chiamata GOOGLE_APPLICATION_CREDENTIALS utilizzando putenv. Questa
           variabile punta al file JSON associato a questa user story contenente le credenziali Google Cloud per accedere all'API Vision. */
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        // un oggetto ImageAnnotatorClient, che interagisce con l'API Google Cloud Vision.
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $spoof = $safe->getSpoof();
        $medical = $safe->getMedical();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        /* Questo array mappa i valori di probabilità (numerici) ai corrispondenti
           nomi delle classi Bootstrap Icons, per consentire una più facile rappresentazione visiva). */
        $likelihoodName = [
            'text-secondary bi bi-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-warning bi bi-exclamation-circle-fill',
            'text-warning bi bi-exclamation-circle-fill',
            'text-danger bi bi-dash-circle-fill',
        ];

        // il job aggiorna l'istanza del modello Image ($i) con i nomi delle classi di icone mappate per ogni categoria
        $i->adult = $likelihoodName[$adult];
        $i->spoofed = $likelihoodName[$spoof];
        $i->medical = $likelihoodName[$medical];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        // infine salva le modifiche nel database
        $i->save();

    }
}
