<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class online_clasess extends Model
{
    use HasFactory;

    protected $table ='online_classes';

    protected $fillable =
    [
        'idprofesseur',
        'meeting_id',
        'topic',
        'start_at',
        'duration',
        'password',
        'start_url',
        'join_url'
    ];
}
