<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'date','id_client'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class,"id_client");
    }
    public function lignecommandes()
        {
            return $this->hasMany(LigneCommande::class);
        }
    public function com(){
        return $this->belongsToMany(Article::class,"id_art");
    }
}
