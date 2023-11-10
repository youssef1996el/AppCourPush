<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationProfesseur extends Model
{
    use HasFactory;
    protected $table= 'formationprof';

    protected $fillable =
    [
         'diplome', 'specialise', 'annee', 'ecole', 'pays', 'iduser'
    ];
}
