<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;


    protected $fillable = [
        'marque',
        'model',
        'plaque_dimmatriculation',
        'nombre_de_place',
        'prix_location_journalier',
    ];
}
