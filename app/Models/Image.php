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

    public function article() : BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

}
