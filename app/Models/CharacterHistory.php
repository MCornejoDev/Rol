<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterHistory extends Model
{
    use HasFactory;

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
