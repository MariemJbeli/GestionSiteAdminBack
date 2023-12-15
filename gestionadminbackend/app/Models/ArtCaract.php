<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtCaract extends Model
{
    use HasFactory;
    protected $fillable = [
        'valeur','id_art','id_caract'
    ];
    public function caract()
    {
        return $this->belongsTo(Caracteristique::class,"id_caract");
    }
    public function article()
    {
        return $this->belongsTo(Article::class,"id_art");
    }
}
