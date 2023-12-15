<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complimantaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_art'
    ];
    public function article()
    {
        return $this->belongsTo(Article::class,"id_art");
    }
}
