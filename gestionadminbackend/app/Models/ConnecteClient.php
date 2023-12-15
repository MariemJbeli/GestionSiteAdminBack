<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnecteClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class,"id_client");
    }
}
