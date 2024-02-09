<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawProject extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function lawProjectLog()
    {
        return $this->hasMany(LawProjectLog::class);
    }

    public function lawProjectSituation()
    {
        return $this->belongsTo(LawProjectSituation::class);
    }

    public function lawProjectStatus()
    {
        return $this->belongsTo(LawProjectStatus::class);
    }

    public function lawProjectStep()
    {
        return $this->belongsTo(LawProjectStep::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function poll()
    {
        return $this->hasOne(Poll::class);
    }
}
