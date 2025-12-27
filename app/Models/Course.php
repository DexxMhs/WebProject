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
    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class)->withTimestamps();
    }

    public function studyPrograms()
    {
        return $this->belongsToMany(
            \App\Models\StudyProgram::class,
            'curriculum',
            'course_id',
            'study_program_id'
        );
    }
}
