<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
