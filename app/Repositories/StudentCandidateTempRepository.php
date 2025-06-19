<?php

namespace App\Repositories;

use App\Interfaces\StudentCandidateTempRepositoryInterface;
use App\Models\CandidateParent;
use App\Models\CandidateSchool;
use App\Models\StudentCandidateTemp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentCandidateTempRepository implements StudentCandidateTempRepositoryInterface
{
    public function updateOrCreateStudentCandidate($data)
    {
        // Pastikan user_id tidak bisa di-override dari input
        $data['user_id'] = Auth::id();

        return StudentCandidateTemp::updateOrCreate(
            [
                'user_id' => Auth::id()
            ],
            $data
        );
    }

    public function getCandidateSchoolDataByCandidateId($candidate_id)
    {
        return CandidateSchool::where('student_candidate_temp_id', $candidate_id)->orderBy('id', 'asc')->get();
    }

    public function getCandidateSchoolData($id)
    {
        return CandidateSchool::where('id', $id)->first();
    }

    public function createCandidateSchool($data)
    {
        switch ($data['abbreviation']) {
            case 's1':
                $data['education_level'] = 'Sarjana';
                break;
            case 'd3':
                $data['education_level'] = 'Diploma';
                break;
            case 'smk':
                $data['education_level'] = 'Sekolah Menengah Kejuruan';
                break;
            case 'sma':
                $data['education_level'] = 'Sekolah Menengah Akhir';
                break;
            case 'smp':
                $data['education_level'] = 'Sekolah Menengah Pertama';
                break;
            case 'sd':
                $data['education_level'] = 'Sekolah Dasar';
                break;
            default:
                break;
        }

        return CandidateSchool::create($data);
    }

    public function deleteCandidateSchool($id)
    {
        return CandidateSchool::find($id)->delete();
    }
    public function getCandidateParentDataByCandidateId($candidate_id)
    {
        return CandidateParent::where('student_candidate_temp_id', $candidate_id)->orderBy('id', 'asc')->get();
    }

    public function getCandidateParentData($id)
    {
        return CandidateParent::where('id', $id)->first();
    }

    public function createCandidateParent($data)
    {
        return CandidateParent::create($data);
    }

    public function deleteCandidateParent($id)
    {
        return CandidateParent::find($id)->delete();
    }

    public function getByUserId($user_id)
    {
        return StudentCandidateTemp::where('user_id', $user_id)->first();
    }

    public function checkUserHasStudentCandidateData()
    {
        return StudentCandidateTemp::where('user_id', Auth::id())->exists();
    }
}
