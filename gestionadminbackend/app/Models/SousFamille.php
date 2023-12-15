<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousFamille extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomSF','id_F'
        ];
        public function famille()
        {
            return $this->belongsTo(Famille::class,"id_F");
        }
        public function article(){
            return $this->hasMany(Article::class);
        }


}
