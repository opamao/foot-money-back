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
        'statut',
    ];

    protected $table = 'utilisateurs';

    protected $primaryKey = 'id_match';
}
