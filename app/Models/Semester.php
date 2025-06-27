<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number',
        'name',
    ];

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
}
