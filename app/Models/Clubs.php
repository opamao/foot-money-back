<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nom_club',
        'logo_club',
        'ville_club',
    ];

    protected $table = 'clubs';

    protected $primaryKey = 'id_club';
}
