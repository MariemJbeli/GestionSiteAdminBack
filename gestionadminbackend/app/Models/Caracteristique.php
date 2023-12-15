<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    use HasFactory;
    protected $fillable = [
        'desgnCaract','libelle','id_mod'
    ];
    public function modele()
    {
        return $this->belongsTo(Modele::class,"id_mod");
    }
    public function artcaracts()
    {
        return $this->hasMany(ArtCaract::class);
    }

}
