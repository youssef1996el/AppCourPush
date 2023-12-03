<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationProf extends Model
{
    use HasFactory;
    protected $table = 'certificationprof';

    protected $fillable =
    [
        'certification',
        'iduser',
    ];
}
