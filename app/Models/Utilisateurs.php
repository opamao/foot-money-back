<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nom_user',
        'prenom_user',
        'phone_user',
        'email_user',
        'photo_user',
    ];

    protected $table = 'utilisateurs';

    protected $primaryKey = 'id_user';
}
