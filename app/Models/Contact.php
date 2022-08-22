<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getIsFavouriteAttribute($value) {
        return $this->users()->pluck('user_id')->contains(auth()->user()->id);
    }
}
