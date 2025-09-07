<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_telp', 'id_rumah_sakit'];
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
