<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCours extends Model
{
    use HasFactory;
    protected $table = 'typecours';
    protected $fillable =
    [
        'type', 'prix', 'iduser'
    ];
}
