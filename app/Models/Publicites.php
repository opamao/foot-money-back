<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicites extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'type',
        'contenu_url',
        'date_debut',
        'fin_debut',
    ];

    protected $table = 'publicites';

    protected $primaryKey = 'id_pub';
}
