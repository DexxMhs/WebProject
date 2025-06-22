<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyProgram extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'degree_level',
        'faculty_id',
        'head_of_program_id',
        'accreditation',
        'established_date',
        'status',
    ];

    // Relation to Faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function degreeLevel()
    {
        return $this->belongsTo(DegreeLevel::class);
    }

    // Relation to Lecturer (as head of program)
    public function headOfProgram()
    {
        return $this->belongsTo(Lecturer::class, 'head_of_program_id');
    }
}
