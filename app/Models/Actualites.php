<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualites extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'titre_news',
        'contenu_news',
        'photo_news',
        'view_news',
    ];

    protected $table = 'actualites';

    protected $primaryKey = 'id_news';
}
