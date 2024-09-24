<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stades extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'libelle_stade',
        'photo_stade',
    ];

    protected $table = 'stades';

    protected $primaryKey = 'id_stade';
}
