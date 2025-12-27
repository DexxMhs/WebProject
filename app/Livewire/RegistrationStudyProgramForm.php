<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Building;
use App\Models\DegreeLevel;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentCandidateTemp;

class RegistrationStudyProgramForm extends Component
{
    public $buildings = [];
    public $degreeLevels = [];
    public $studyPrograms = [];

    public $building_id;
    public $degree_level_id;
    public $study_program_id;

    public function mount()
    {
        $this->buildings = Building::all();
        $this->degreeLevels = DegreeLevel::all();

        // Ambil data awal dari candidate jika ada
        $candidate = StudentCandidateTemp::where('user_id', Auth::id())->first();

        $this->building_id = $candidate->building_id ?? null;
        $this->degree_level_id = $candidate->degree_level_id ?? null;
        $this->study_program_id = $candidate->study_program_id ?? null;

        $this->filterStudyPrograms();
    }

    public function updatedBuildingId()
    {
        $this->filterStudyPrograms();
    }

    public function updatedDegreeLevelId()
    {
        $this->filterStudyPrograms();
    }

    public function filterStudyPrograms()
    {
        $query = StudyProgram::query();

        if ($this->building_id) {
            $query->whereHas('buildings', function ($q) {
                $q->where('buildings.id', $this->building_id);
            });
        }

        if ($this->degree_level_id) {
            $query->where('degree_level_id', $this->degree_level_id);
        }

        $this->studyPrograms = $query->get();
    }

    public function render()
    {
        return view('livewire.registration-study-program-form');
    }
}
