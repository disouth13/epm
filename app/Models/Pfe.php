<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pfe extends Model
{
    use HasFactory;

    protected $guarded = [];

    // table plural atau tidak ada huruf s dibelakang
    protected $table = 'pfe';

    
}
