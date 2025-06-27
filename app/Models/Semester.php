<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'order',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_program_semester')
            ->withPivot('study_program_id')
            ->withTimestamps();
    }

    public function studyPrograms()
    {
        return $this->belongsToMany(StudyProgram::class, 'course_program_semester')
            ->withPivot('course_id')
            ->withTimestamps();
    }
}
