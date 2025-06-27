<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'credit',
        'description',
    ];

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'course_program_semester')
            ->withPivot('study_program_id')
            ->withTimestamps();
    }

    public function studyPrograms()
    {
        return $this->belongsToMany(StudyProgram::class, 'course_program_semester')
            ->withPivot('semester_id')
            ->withTimestamps();
    }
}
