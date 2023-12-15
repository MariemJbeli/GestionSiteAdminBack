<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomPrenom','adress','email','motPass'
        ];
        public function commande()
        {
            return $this->hasMany(Commande::class);
        }


}
