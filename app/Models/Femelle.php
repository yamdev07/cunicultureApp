<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Femelle extends Model
{
    use HasFactory;

    protected $table = 'femelles';

    protected $fillable = [
        'code', 'nom', 'race', 'origine', 'date_naissance', 'etat'
    ];

    public function saillies()
    {
        return $this->hasMany(Saillie::class);
    }
}
