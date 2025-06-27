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
}
