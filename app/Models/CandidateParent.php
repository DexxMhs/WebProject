<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateParent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_candidate_temp_id',
        'parent_name',
        'relationship',
        'parent_job_type',
        'parent_last_education',
        'parent_email',
        'parent_phone_number',
    ];

    public function candidate()
    {
        return $this->belongsTo(StudentCandidateTemp::class);
    }
}
