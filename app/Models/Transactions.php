<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'type_trans',
        'montant_trans',
        'methode_paiement_trans',
        'utilisateur_id',
    ];

    protected $table = 'transactions';

    protected $primaryKey = 'id_trans';
}
