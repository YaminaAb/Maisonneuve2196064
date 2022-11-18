<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'texte', 'titre_en','texte_en', 'etudiants_id', 'etudiants_users_id'];

}
