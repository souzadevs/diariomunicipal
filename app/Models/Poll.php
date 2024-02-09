<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function lawProject()
    {
        return $this->hasOne(LawProject::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
