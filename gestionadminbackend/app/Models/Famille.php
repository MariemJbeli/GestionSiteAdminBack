<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomF','id_cat'

    ];
    public function categories()
    {
        return $this->belongsTo(Categorie::class,"id_cat");
    }


}
