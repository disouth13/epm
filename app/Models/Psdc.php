<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psdc extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function belongsToUser()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

// join table psdc dan table user

