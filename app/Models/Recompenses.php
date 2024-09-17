<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recompenses extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'type_recom',
        'description_recom',
        'statut_recom',
        'utilisateur_id',
    ];

    protected $table = 'recompenses';

    protected $primaryKey = 'id_recom';
}
