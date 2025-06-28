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
        'degree_level_id',
        'faculty_id',
        'head_of_program_id',
        'accreditation',
        'established_date',
        'status',
        'image',
        'description',
    ];

    public function degreeLevel()
    {
        return $this->belongsTo(DegreeLevel::class);
    }

    // Relation to Faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    // Relation to Lecturer (as head of program)
    public function headOfProgram()
    {
        return $this->belongsTo(Lecturer::class, 'head_of_program_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'building_study_program');
    }

    public function courses()
    {
        return $this->belongsToMany(
            \App\Models\Course::class,
            'curriculum',
            'study_program_id',
            'course_id'
        );
    }
}
