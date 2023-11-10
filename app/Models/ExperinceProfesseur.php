<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperinceProfesseur extends Model
{
    use HasFactory;
    protected $table= 'experinceprof';

    protected $fillable =
    [
        'poste', 'entreprise', 'pays', 'du', 'au', 'iduser'
    ];
}
