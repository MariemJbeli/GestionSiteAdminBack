<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'desgnArt','prix','ancienPrix','etat','dureeGarantie','refInternational','livraison','id_SF','image'
        ];

        public function sousFamille()
        {
        return $this->belongsTo(sousFamille::class,"id_SF");
        }
        public function artcaracts()
        {
            return $this->hasMany(ArtCaract::class);
        }
        public function lignecommandes()
        {
            return $this->hasMany(LigneCommande::class);
        }

        public function com(){
            return $this->belongsToMany(Commande::class,"id_com");
        }
}

