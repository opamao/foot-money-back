<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nom_club',
        'logo_club',
        'ville_club',
        'phone_club',
        'email_club',
        'website_club',
        'nom_respo_club',
        'phone_respo_club',
        'email_respo_club',
        'website_respo_club',
        'photo_respo_club',
    ];

    protected $table = 'clubs';

    protected $primaryKey = 'id_club';
}
