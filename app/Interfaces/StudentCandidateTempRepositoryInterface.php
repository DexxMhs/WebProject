<?php

namespace App\Interfaces;

interface StudentCandidateTempRepositoryInterface
{
    public function updateOrCreateStudentCandidate($data);

    public function checkUserHasStudentCandidateData();
}
