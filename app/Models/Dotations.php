<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dotations extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'montant_dot',
        'methode_paiement_dot',
        'utilisateur_id',
        'joueur_id',
        'match_id',
    ];

    protected $table = 'dotations';

    protected $primaryKey = 'id_dot';
}
