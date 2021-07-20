<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouter extends Model
{
    use HasFactory;

    protected $vouter = ["prenom", "nom", "age", "email", "tel",];

    protected $guarded = [];
}
