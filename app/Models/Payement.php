<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;
    protected $table = 'payements';
    protected $fillable =
    [
        'total', 'nombrecard', 'namecard', 'monthandday', 'cvc', 'ideleve'
    ];
}
