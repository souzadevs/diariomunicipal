<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function law()
    {
        return $this->belongsTo(Law::class);
    }
}
