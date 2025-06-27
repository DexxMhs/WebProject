<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'course_id',
        'study_program_id',
        'academic_semester_id',
        'semester_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function academicSemester()
    {
        return $this->belongsTo(AcademicSemester::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
