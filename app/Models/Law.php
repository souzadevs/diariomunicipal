<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Law extends Model
{
    use HasFactory, SoftDeletes;

    public function lawLog()
    {
        return $this->hasMany(LawLog::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function lawStatus()
    {
        return $this->belongsTo(LawStatus::class);
    }

}
