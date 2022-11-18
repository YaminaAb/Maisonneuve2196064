<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class File extends Model
{
    use HasFactory;
    protected $fillable = ['titre','titre_en','file','etudiants_id','etudiants_users_id' ];

}