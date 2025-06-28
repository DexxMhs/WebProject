<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DegreeLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'duration_years',
        'image',
        'description',
    ];

    // Relasi ke study programs
    public function studyPrograms()
    {
        return $this->hasMany(StudyProgram::class);
    }

    // Akses URL gambar
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
