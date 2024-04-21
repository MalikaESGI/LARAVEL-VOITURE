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
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');  // Utilisez le nom de la classe 'Categorie'
    }
}
