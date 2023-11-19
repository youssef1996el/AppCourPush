<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursProfesseur extends Model
{
    use HasFactory;
    protected $table = 'courprof';
    protected $fillable =
    [
       'idcours', 'iduser'
    ];
}
