<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{

    use HasFactory;

    protected $fillable = ['path'];

    // Restituisce l'URL dell'immagine, eventualmente ridimensionata
    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h) {
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $fileName = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$fileName}";
        return Storage::url($file);

    }

    // La funzione getUrl consente alle istanze di classe immagine di recuperare facilmente l'URL dell'immagine restituita da getUrlByFilePath.
    public function getUrl($w = null, $h = null)
    {
        return self::getUrlByFilePath($this->path, $w, $h);
    }


    /*  Il metodo casts() fornito da laravel consente di fare il casting: il casting in Laravel è un processo di conversione automatica dei dati tra
        formati diversi. Viene utilizzato principalmente per convertire i valori memorizzati nel database in tipi di dati PHP più adatti per l'utilizzo nelle
        applicazioni Laravel. Questo semplifica la gestione e la manipolazione dei dati all'interno del framework.
        In questo caso stiamo facendo il casting della colonna labels in array. */
    protected function casts(): array
    {
        return [
            'labels' => 'array'
        ];
    }

    public function article() : BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

}
