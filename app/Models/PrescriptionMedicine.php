<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    use HasFactory;

    protected $guarded = [' '];

    public function medicine()
    {
        return $this->belongsTo(Medicien::class, 'medicine_id','id');
    }
}
