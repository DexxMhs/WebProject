<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'class_id',
        'study_program_id',
        'degree_level_id',
        'building_id',
        'nim',
        'enrollment_year',
        'status',
        'full_name',
        'gender',
        'address',
    ];

    // RELATIONS

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function degreeLevel()
    {
        return $this->belongsTo(DegreeLevel::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
