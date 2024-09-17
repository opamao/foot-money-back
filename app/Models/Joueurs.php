<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueurs extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nom_joue',
        'prenom_joue',
        'naissance_joue',
        'poste_joue',
        'phone_joue',
        'email_joue',
        'photo_joue',
        'club_id',
    ];

    protected $table = 'joueurs';

    protected $primaryKey = 'id_joue';
}
