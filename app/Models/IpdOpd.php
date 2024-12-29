<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpdOpd extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(User::class, 'pataint_id','id');
    }
}
