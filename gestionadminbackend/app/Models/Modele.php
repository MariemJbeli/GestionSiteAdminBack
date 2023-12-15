<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    protected $fillable = [
        'desgnModele','id_cat'
        ];
        public function categories()
        {
        return $this->belongsTo(Categorie::class,"id_cat");
        }
}
