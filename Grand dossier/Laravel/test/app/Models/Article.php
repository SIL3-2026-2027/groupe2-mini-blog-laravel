<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Permet d'utiliser les factories (on verra ça à l'étape 7)
    use HasFactory;

    /**
     * Liste blanche des champs autorisés au remplissage de masse (Mass Assignment).
     * On n'autorise pas 'id', car c'est la base de données qui le gère.
     */
    protected $fillable = [
        'title',
        'image',
        'contenu',
        'publie',
        'user_id',
    ];

    /**
     * Relation : Un article appartient à UN utilisateur (l'auteur).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}