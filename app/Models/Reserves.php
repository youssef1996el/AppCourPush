<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserves extends Model
{
    use HasFactory;
    protected $table = 'reserves';
    protected $fillable =
    [
       'nom_eleve', 'nom_professeur', 'idcours', 'times', 'days','typecours','created_at','updated_at'
    ];
}
