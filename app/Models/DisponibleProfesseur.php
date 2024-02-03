<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisponibleProfesseur extends Model
{
    use HasFactory;
    protected $table= 'disponibleprof';

    protected $fillable =
    [
        'jour', 'debut', 'fin','iduser','idcours','typecours','timezone'
    ];
}
