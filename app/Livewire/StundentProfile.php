<?php

namespace App\Livewire;

use App\Repositories\StudentCandidateTempRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StundentProfile extends Component
{
    // Data slide 1
    public $full_name;
    public $nik;
    public $citizenship;
    public $gender;
    public $religion;
    public $date_of_birth;
    public $country_of_birth;
    public $address;
    public $email;
    public $phone_number;

    // Data slide 2
    public $abbreviation;
    public $school_name;
    public $graduation_year;
    public $major;

    // Data slide 3
    public $parent_name;
    public $relationship;
    public $parent_job_type;
    public $parent_last_education;
    public $parent_email;
    public $parent_phone_number;


    // Perhitungan slide (untuk logika perpindahan slide)
    public $currentSlide = 1;
    public $totalSlides = 3;
    public $savedSlides = [];

    // Variable penampung
    public $hasCandidateData = false;
    public $candidateId;
    public $candidateSchoolData;
    public $candidateSchoolId;
    public $candidateParentData;
    public $candidateParentId;



    public function mount()
    {
        $this->loadStudentData();
    }

    public function render()
    {
        $this->candidateSchoolData = app(StudentCandidateTempRepository::class)
            ->getCandidateSchoolDataByCandidateId($this->candidateId);

        $this->candidateParentData = app(StudentCandidateTempRepository::class)
            ->getCandidateParentDataByCandidateId($this->candidateId);

        return view('livewire.stundent-profile');
    }

    public function goToSlide($slideNumber)
    {
        // Validasi sebelum pindah slide

        if ($slideNumber > $this->totalSlides) {
            return;
        }

        $this->currentSlide = $slideNumber;
    }

    public function nextSlide()
    {
        if ($this->currentSlide < $this->totalSlides) {
            // Simpan data sebelum pindah slide
            if ($this->currentSlide == 1) {
                $this->saveCurrentSlideData();
            }

            $this->goToSlide($this->currentSlide + 1);
        }
    }

    public function prevSlide()
    {
        if ($this->currentSlide > 1) {
            $this->goToSlide($this->currentSlide - 1);
        }
    }

    protected function isCurrentSlideSaved()
    {
        return in_array($this->currentSlide, $this->savedSlides);
    }

    protected function saveCurrentSlideData()
    {
        // dd($this->currentSlide);
        $rules = $this->getSlideRules($this->currentSlide);
        $error_message = $this->getSlideErrorMessage($this->currentSlide);
        $validatedData = $this->validate($rules, $error_message);

        // Simpan ke repository (sesuaikan dengan kebutuhan)
        app(StudentCandidateTempRepository::class)
            ->updateOrCreateStudentCandidate($validatedData);

        // Tandai slide ini sudah disimpan
        $this->savedSlides[] = $this->currentSlide;
        $this->savedSlides = array_unique($this->savedSlides);

        // Dapatkan Data jika sudah berhasil ditambahkan atau diupdate
        $this->loadStudentData();
        session()->flash('success', 'Data yang anda masukkan sudah tersimpan');
    }

    protected function getSlideRules($slideNumber)
    {
        $studentCandidateRepo = app(StudentCandidateTempRepository::class);
        $studentData = $studentCandidateRepo->getByUserId(Auth::id());
        // Atur rules per slide
        switch ($slideNumber) {
            case 1: // Slide Data Diri
                if ((!empty($this->nik) && !empty($this->email)) && ($this->nik == $studentData->nik || $this->email == $studentData->email)) {
                    return [
                        'full_name'         => 'required|string|max:255',
                        'gender'            => 'required|in:male,female',
                        'religion'          => 'required|string|max:255',
                        'date_of_birth'     => 'required|date',
                        'country_of_birth'  => 'required|string|max:255',
                        'citizenship'       => 'required|string|max:255',
                        'nik'               => 'required|digits:16|numeric',
                        'address'           => 'required|string|max:500',
                        'email'             => 'required|email|max:255',
                        'phone_number'      => 'required',
                    ];
                } else {
                    return [
                        'full_name'         => 'required|string|max:255',
                        'gender'            => 'required|in:male,female',
                        'religion'          => 'required|string|max:255',
                        'date_of_birth'     => 'required|date',
                        'country_of_birth'  => 'required|string|max:255',
                        'citizenship'       => 'required|string|max:255',
                        'nik'               => 'required|digits:16|numeric|unique:student_candidate_temps,nik',
                        'address'           => 'required|string|max:500',
                        'email'             => 'required|email|max:255|unique:users,email',
                        'phone_number'      => 'required',
                    ];
                }
            case 2: // Slide Pendidikan
                return [
                    'abbreviation'    => 'required|string|max:100',
                    'school_name'     => 'required|string|max:255',
                    'graduation_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
                    'major'           => 'required|string|max:255',
                ];

            case 3: // Slide Orang Tua
                return [
                    'parent_name'            => 'required|string|max:255',
                    'relationship'           => 'required|string|max:100',
                    'parent_job_type'        => 'required|string|max:255',
                    'parent_last_education'  => 'required|string|max:100',
                    'parent_email'           => 'required|email|max:255|unique:candidate_parents,parent_email',
                    'parent_phone_number'    => 'required|string|max:20',
                ];

            default:
                return [];
        }
    }

    public function getSlideErrorMessage($slideNumber)
    {
        $studentCandidateRepo = app(StudentCandidateTempRepository::class);
        $studentData = $studentCandidateRepo->getByUserId(Auth::id());

        // Atur rules per slide
        switch ($slideNumber) {
            case 1: // Slide Data Diri
                if ((!empty($this->nik) && !empty($this->email)) && ($this->nik == $studentData->nik || $this->email == $studentData->email)) {
                    return [
                        'full_name.required'         => 'Nama lengkap wajib diisi.',
                        'full_name.string'           => 'Nama lengkap harus berupa teks.',
                        'full_name.max'              => 'Nama lengkap tidak boleh lebih dari 255 karakter.',

                        'gender.required'            => 'Jenis kelamin wajib dipilih.',
                        'gender.in'                  => 'Jenis kelamin harus Laki-Laki atau Perempuan.',

                        'religion.required'          => 'Agama wajib diisi.',
                        'religion.string'            => 'Agama harus berupa teks.',
                        'religion.max'               => 'Agama tidak boleh lebih dari 255 karakter.',

                        'date_of_birth.required'     => 'Tanggal lahir wajib diisi.',
                        'date_of_birth.date'         => 'Tanggal lahir harus berupa format tanggal yang valid.',

                        'country_of_birth.required'  => 'Tempat lahir wajib diisi.',
                        'country_of_birth.string'    => 'Tempat lahir harus berupa teks.',
                        'country_of_birth.max'       => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

                        'citizenship.required'       => 'Kewarganegaraan wajib diisi.',
                        'citizenship.string'         => 'Kewarganegaraan harus berupa teks.',
                        'citizenship.max'            => 'Kewarganegaraan tidak boleh lebih dari 255 karakter.',

                        'nik.required'               => 'NIK wajib diisi.',
                        'nik.digits'                 => 'NIK harus terdiri dari 16 digit.',
                        'nik.numeric'                => 'NIK harus berupa angka.',

                        'address.required'           => 'Alamat wajib diisi.',
                        'address.string'             => 'Alamat harus berupa teks.',
                        'address.max'                => 'Alamat tidak boleh lebih dari 500 karakter.',

                        'email.required'             => 'Email wajib diisi.',
                        'email.email'                => 'Format email tidak valid.',
                        'email.max'                  => 'Email tidak boleh lebih dari 255 karakter.',

                        'phone_number.required'      => 'Nomor handphone wajib diisi.',
                    ];
                } else {
                    return [
                        'full_name.required'         => 'Nama lengkap wajib diisi.',
                        'full_name.string'           => 'Nama lengkap harus berupa teks.',
                        'full_name.max'              => 'Nama lengkap tidak boleh lebih dari 255 karakter.',

                        'gender.required'            => 'Jenis kelamin wajib dipilih.',
                        'gender.in'                  => 'Jenis kelamin harus Laki-Laki atau Perempuan.',

                        'religion.required'          => 'Agama wajib diisi.',
                        'religion.string'            => 'Agama harus berupa teks.',
                        'religion.max'               => 'Agama tidak boleh lebih dari 255 karakter.',

                        'date_of_birth.required'     => 'Tanggal lahir wajib diisi.',
                        'date_of_birth.date'         => 'Tanggal lahir harus berupa format tanggal yang valid.',

                        'country_of_birth.required'  => 'Tempat lahir wajib diisi.',
                        'country_of_birth.string'    => 'Tempat lahir harus berupa teks.',
                        'country_of_birth.max'       => 'Tempat lahir tidak boleh lebih dari 255 karakter.',

                        'citizenship.required'       => 'Kewarganegaraan wajib diisi.',
                        'citizenship.string'         => 'Kewarganegaraan harus berupa teks.',
                        'citizenship.max'            => 'Kewarganegaraan tidak boleh lebih dari 255 karakter.',

                        'nik.required'               => 'NIK wajib diisi.',
                        'nik.digits'                 => 'NIK harus terdiri dari 16 digit.',
                        'nik.numeric'                => 'NIK harus berupa angka.',
                        'nik.unique'                 => 'NIK sudah terdaftar.',

                        'address.required'           => 'Alamat wajib diisi.',
                        'address.string'             => 'Alamat harus berupa teks.',
                        'address.max'                => 'Alamat tidak boleh lebih dari 500 karakter.',

                        'email.required'             => 'Email wajib diisi.',
                        'email.email'                => 'Format email tidak valid.',
                        'email.max'                  => 'Email tidak boleh lebih dari 255 karakter.',
                        'email.unique'               => 'Email sudah digunakan.',

                        'phone_number.required'      => 'Nomor handphone wajib diisi.',
                    ];
                }
            case 2: // Slide Pendidikan
                return [
                    'abbreviation.required'       => 'Singkatan sekolah wajib diisi.',
                    'abbreviation.string'         => 'Singkatan sekolah harus berupa teks.',
                    'abbreviation.max'            => 'Singkatan sekolah tidak boleh lebih dari 100 karakter.',

                    'school_name.required'        => 'Nama sekolah wajib diisi.',
                    'school_name.string'          => 'Nama sekolah harus berupa teks.',
                    'school_name.max'             => 'Nama sekolah tidak boleh lebih dari 255 karakter.',

                    'graduation_year.required'    => 'Tahun kelulusan wajib diisi.',
                    'graduation_year.digits'      => 'Tahun kelulusan harus terdiri dari 4 digit.',
                    'graduation_year.integer'     => 'Tahun kelulusan harus berupa angka.',
                    'graduation_year.min'         => 'Tahun kelulusan tidak boleh kurang dari 1900.',
                    'graduation_year.max'         => 'Tahun kelulusan tidak boleh lebih dari tahun saat ini.',

                    'major.required'              => 'Jurusan wajib diisi.',
                    'major.string'                => 'Jurusan harus berupa teks.',
                    'major.max'                   => 'Jurusan tidak boleh lebih dari 255 karakter.',
                ];

            case 3: // Slide Orang Tua
                return [
                    'parent_name.required'              => 'Nama orang tua wajib diisi.',
                    'parent_name.string'                => 'Nama orang tua harus berupa teks.',
                    'parent_name.max'                   => 'Nama orang tua tidak boleh lebih dari 255 karakter.',

                    'relationship.required'             => 'Hubungan dengan siswa wajib diisi.',
                    'relationship.string'               => 'Hubungan harus berupa teks.',
                    'relationship.max'                  => 'Hubungan tidak boleh lebih dari 100 karakter.',

                    'parent_job_type.required'          => 'Pekerjaan orang tua wajib diisi.',
                    'parent_job_type.string'            => 'Pekerjaan harus berupa teks.',
                    'parent_job_type.max'               => 'Pekerjaan tidak boleh lebih dari 255 karakter.',

                    'parent_last_education.required'    => 'Pendidikan terakhir orang tua wajib diisi.',
                    'parent_last_education.string'      => 'Pendidikan terakhir harus berupa teks.',
                    'parent_last_education.max'         => 'Pendidikan terakhir tidak boleh lebih dari 100 karakter.',

                    'parent_email.required'             => 'Email orang tua wajib diisi.',
                    'parent_email.email'                => 'Format email orang tua tidak valid.',
                    'parent_email.max'                  => 'Email orang tua tidak boleh lebih dari 255 karakter.',
                    'parent_email.unique'               => 'Email orang tua sudah terdaftar.',

                    'parent_phone_number.required'      => 'Nomor handphone orang tua wajib diisi.',
                    'parent_phone_number.string'        => 'Nomor handphone harus berupa teks.',
                    'parent_phone_number.max'           => 'Nomor handphone tidak boleh lebih dari 20 karakter.',
                ];

            default:
                return [];
        }
    }

    protected function loadStudentData()
    {
        $studentCandidateRepo = app(StudentCandidateTempRepository::class);

        $studentData = $studentCandidateRepo->getByUserId(Auth::id());
        $this->hasCandidateData = !is_null($studentData);

        if ($this->hasCandidateData) {
            $this->candidateId = $studentData->id;
            $this->full_name = $studentData->full_name;
            $this->nik = $studentData->nik;
            $this->citizenship = $studentData->citizenship;
            $this->gender = $studentData->gender;
            $this->religion = $studentData->religion;
            $this->date_of_birth = $studentData->date_of_birth;
            $this->country_of_birth = $studentData->country_of_birth;
            $this->address = $studentData->address;
            $this->email = $studentData->email;
            $this->phone_number = $studentData->phone_number;
        }
    }

    public function clearCandidateSchool()
    {
        $this->abbreviation = null;
        $this->school_name = null;
        $this->graduation_year = null;
        $this->major = null;
        $this->candidateSchoolId = null;
    }

    public function createCandidateSchool()
    {
        $this->clearCandidateSchool();
    }

    public function saveCandidateSchool()
    {
        $rules = $this->getSlideRules(2);
        $error_message = $this->getSlideErrorMessage(2);

        $validatedData = $this->validate($rules, $error_message);

        $validatedData['student_candidate_temp_id'] = $this->candidateId;

        app(StudentCandidateTempRepository::class)
            ->createCandidateSchool($validatedData);

        foreach ($validatedData as $key => $value) {
            $this->{$key} = null;
        }

        $this->dispatch('closeModal', ['id' => 'addSchoolData']);
        session()->flash('success', 'Data yang anda masukkan sudah tersimpan');
    }

    public function resetSchoolForm()
    {
        $this->reset([
            'abbreviation',
            'major',
            'school_name',
            'graduation_year',
        ]);

        $this->resetValidation(); // Menghapus pesan error
    }

    public function viewCandidateSchool($id)
    {
        $candidateSchool = app(StudentCandidateTempRepository::class)->getCandidateSchoolData($id);

        $this->abbreviation = $candidateSchool->abbreviation;
        $this->school_name = $candidateSchool->school_name;
        $this->graduation_year = $candidateSchool->graduation_year;
        $this->major = $candidateSchool->major;
    }

    public function deleteCandidateSchoolConfirmation($id)
    {
        $this->candidateSchoolId = $id;
    }

    public function deleteCandidateSchool()
    {
        app(StudentCandidateTempRepository::class)->deleteCandidateSchool($this->candidateSchoolId);
        $this->clearCandidateSchool();
        session()->flash('success', 'Data yang dipilih berhasil dihapus');
    }

    public function clearCandidateParent()
    {
        $this->candidateParentId = null;
        $this->parent_name = null;
        $this->relationship = null;
        $this->parent_job_type = null;
        $this->parent_last_education = null;
        $this->parent_email = null;
        $this->parent_phone_number = null;
    }

    public function createCandidateParent()
    {
        $this->clearCandidateParent();
    }

    public function saveCandidateParent()
    {
        $rules = $this->getSlideRules(3);
        $error_message = $this->getSlideErrorMessage(3);
        $validatedData = $this->validate($rules, $error_message);

        $validatedData['student_candidate_temp_id'] = $this->candidateId;

        app(StudentCandidateTempRepository::class)
            ->createCandidateParent($validatedData);

        foreach ($validatedData as $key => $value) {
            $this->{$key} = null;
        }

        $this->dispatch('closeModal', ['id' => 'addParentData']);
        session()->flash('success', 'Data yang anda masukkan sudah tersimpan');
    }

    public function resetParentForm()
    {
        $this->reset([
            'relationship',
            'parent_name',
            'parent_last_education',
            'parent_job_type',
            'parent_email',
            'parent_phone_number',
        ]);

        $this->resetValidation(); // Ini yang menghapus pesan error
    }

    public function viewCandidateParent($id)
    {
        $candidateSchool = app(StudentCandidateTempRepository::class)->getCandidateParentData($id);

        $this->parent_name = $candidateSchool->parent_name;
        $this->relationship = $candidateSchool->relationship;
        $this->parent_job_type = $candidateSchool->parent_job_type;
        $this->parent_last_education = $candidateSchool->parent_last_education;
        $this->parent_email = $candidateSchool->parent_email;
        $this->parent_phone_number = $candidateSchool->parent_phone_number;
    }

    public function deleteCandidateParentConfirmation($id)
    {
        $this->candidateParentId = $id;
    }

    public function deleteCandidateParent()
    {
        app(StudentCandidateTempRepository::class)->deleteCandidateParent($this->candidateParentId);
        $this->clearCandidateParent();
        session()->flash('success', 'Data yang dipilih berhasil dihapus');
    }

    public function cancelAndCloseModal($modalName)
    {
        if ($modalName == 'addSchoolData') {
            $this->resetSchoolForm();
        } elseif ($modalName == 'addParentData') {
            $this->resetSchoolForm();
        }

        // Kirim event JS untuk menutup modal
        $this->dispatch('closeModal', ['id' => $modalName]);
    }

    public function redirectToStudentRegistration()
    {
        dd('masuk');
        return redirect()->route('dashboard.student-registration');
    }
}
