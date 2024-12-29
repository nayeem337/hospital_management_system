<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDosage extends Model
{
    use HasFactory;

    protected $guarded = [' '];
    public function dosage()

    {
        return $this->belongsTo(Diagnostic::class, 'diagnosis_id','id');
    }

}
