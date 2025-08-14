<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapereau extends Model
{
    use HasFactory;

    protected $fillable = [
        'mise_bas_id', 'age_semaines', 'categorie', 'alimentation_jour', 'alimentation_semaine'
    ];

    public function miseBas()
    {
        return $this->belongsTo(MiseBas::class);
    }
}
