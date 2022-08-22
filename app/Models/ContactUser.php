<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUser extends Model
{
    use HasFactory;

    protected $table = 'contact_user';

    protected $hidden = [];

    protected $fillable = [
        'user_id',
        'contact_id',
    ];
}
