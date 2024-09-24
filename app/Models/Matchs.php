<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'debut',
        'heure',
        'club_one_id',
        'club_two_id',
        'stade_id',
        'journee',
        'statut',
    ];

    protected $table = 'matchs';

    protected $primaryKey = 'id_match';
}
