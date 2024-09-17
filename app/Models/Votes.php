<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nombre_vote',
        'utilisateur_id',
        'joueur_id',
        'match_id',
    ];

    protected $table = 'votes';

    protected $primaryKey = 'id_vote';
}
