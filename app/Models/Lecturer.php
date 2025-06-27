<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nidn',
        'name',
        'gender',
        'email',
        'phone',
        'address',
        'photo',
        'faculty_id',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function coordinatedPrograms()
    {
        return $this->hasMany(StudyProgram::class, 'head_of_program_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : asset('images/default.png');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
