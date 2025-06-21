<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_candidate_temp_id',
        'education_level',
        'abbreviation',
        'school_name',
        'graduation_year',
        'major',
    ];

    public function candidate()
    {
        return $this->belongsTo(StudentCandidateTemp::class);
    }
}
