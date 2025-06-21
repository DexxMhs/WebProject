<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentCandidateTemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'religion',
        'date_of_birth',
        'country_of_birth',
        'citizenship',
        'nik',
        'address',
        'email',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parents()
    {
        return $this->hasMany(CandidateParent::class);
    }

    public function schools()
    {
        return $this->hasMany(CandidateSchool::class);
    }
}
