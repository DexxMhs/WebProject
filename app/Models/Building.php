<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'address',
        'description',
        'photo',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function studyPrograms()
    {
        return $this->belongsToMany(StudyProgram::class, 'building_study_program');
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class)->withTimestamps();
    }
}
