<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personne extends Model
{
    use HasFactory;
    protected $table ="personne";
    protected $fillable = [
        "nom",
        "prenom",
        "telephone",
    ];
}
