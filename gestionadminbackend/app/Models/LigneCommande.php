<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_com','id_art','quantite'

    ];
    public function commande()
    {
        return $this->belongsTo(Commande::class,"id_com");
    }
    public function article()
    {
        return $this->belongsTo(Article::class,"id_art");
    }
}
