<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = "todos";

    protected $appends = ['editFlag']; 

    protected $guarded = ['id']; 

    public function getEditFlagAttribute()
    {
        return false;
    }
}

