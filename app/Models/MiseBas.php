<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiseBas extends Model
{
    use HasFactory;

    // Ajoute cette ligne pour forcer le nom correct de la table
    protected $table = 'mises_bas';

    protected $fillable = [
        'saillie_id', 'date_mise_bas', 'nb_vivant', 'nb_mort_ne', 'nb_retire',
        'nb_adopte', 'date_sevrage', 'poids_moyen_sevrage'
    ];

    public function saillie()
    {
        return $this->belongsTo(Saillie::class);
    }

    public function lapereaux()
    {
        return $this->hasMany(Lapereau::class);
    }
}
