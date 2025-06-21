<form action="">
    @csrf
    <div class="form-container mt-2">
        @include('dashboard.partials._message')
        <!-- SLIDE 1: Data Diri -->
        <div id="slide1" class="slide active" style="{{ $currentSlide != 1 ? 'display:none;' : '' }}">
            <h2 class="form-title mb-2" style="margin-bottom: 1rem;"><i class="bi bi-person-circle"></i> DATA DIRI</h2>
            {{-- <div class="mx-auto d-block mb-3" style="height: 100px;">
                <div class="photo-profile d-block mx-auto">
                    <div class="profile-dp rounded-circle mx-auto d-block"
                        onclick="document.getElementById('imageInput').click()">
                        <img id="previewImage" class="rounded-circle mx-auto d-block" style="height: 100%"
                            src="{{ asset('images/admin.jpg') }}" alt="Photo Profile">
                        <div class="overlay rounded-circle">
                            <span class="">Ubah</span>
                        </div>
                    </div>
                    <div class="camera-icon">
                        <i class="fa fa-camera"></i>
                    </div>
                </div>
                <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)">
            </div> --}}
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama-lengkap">Nama Lengkap<i>*</i></label>
                    <input type="text" id="nama-lengkap" name="nama-lengkap"
                        class="form-control @error('full_name') is-invalid @enderror"
                        placeholder="Masukkan Nama Lengkap" wire:model="full_name">
                    @error('full_name')
                        <p class="invalid-feedback" style="margin-bottom: 0px">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nik">Nomor Induk Kewarganegaraan<i>*</i></label>
                    <input type="text" id="nik" name="nik"
                        class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan Nomor NIK"
                        wire:model="nik">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="citizenship">Kewarganegaraan<i>*</i></label>
                    <input type="text" id="citizenship" name="citizenship"
                        class="form-control @error('citizenship') is-invalid @enderror"
                        placeholder="Masukkan Negara Asal" wire:model="citizenship">
                    @error('citizenship')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Jenis Kelamin<i>*</i></label>
                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror"
                        wire:model="gender">
                        <option value="" hidden>Pilih Jenis Kelamin</option>
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tempat-lahir">Tempat Lahir<i>*</i></label>
                    <input type="text" id="tempat-lahir" name="tempat-lahir"
                        class="form-control @error('country_of_birth') is-invalid @enderror"
                        placeholder="Tempat Tanggal Lahir" wire:model="country_of_birth">
                    @error('country_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal-lahir">Tanggal Lahir<i>*</i></label>
                    <input type="date" id="tanggal-lahir" name="tanggal-lahir"
                        class="form-control @error('date_of_birth') is-invalid @enderror" wire:model="date_of_birth">
                    @error('date_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat-lengkap">Alamat Lengkap<i>*</i></label>
                    <input type="text" id="alamat-lengkap" name="alamat-lengkap"
                        class="form-control @error('address') is-invalid @enderror"
                        placeholder="Masukkan Alamat Lengkap" wire:model="address">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="agama">Agama<i>*</i></label>
                    <select name="agama" id="agama" class="form-control @error('religion') is-invalid @enderror"
                        wire:model="religion">
                        <option value="" hidden>Pilih Agama</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katolik">Katolik</option>
                        <option value="budha">Budha</option>
                        <option value="hindu">Hindu</option>
                        <option value="khonghucu">Khonghucu</option>
                    </select>
                    @error('religion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email<i>*</i></label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email"
                        wire:model="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="handphone">No Handphone<i>*</i></label>
                    <input type="number" id="handphone" name="handphone"
                        class="form-control @error('phone_number') is-invalid @enderror"
                        placeholder="Masukkan No Handphone" wire:model="phone_number">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mx-auto" style="display: flex; align-items: center; justify-content: center;">
                <button class="btn btn-primary" type="button" id="nextBtn" wire:click="nextSlide">Selanjutnya <i
                        class="bi bi-arrow-right-short"></i></button>
            </div>
        </div>

        <!-- SLIDE 2: Pendidikan -->
        <div id="slide2" class="slide" style="{{ $currentSlide != 2 ? 'display:none;' : '' }}">
            <h2 class="form-title mb-4"><i class="bi bi-backpack"></i> PENDIDIKAN</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" style="display:flex; align-items: center">
                                    <div>
                                        <strong class="card-title">Data Pendidikan</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-success btn-sm float-right py-2"
                                        style="border-radius: 7px" data-toggle="modal" data-target="#addSchoolData"
                                        wire:click="createCandidateSchool"><i class="fa fa-plus"></i>&nbsp; Tambah
                                        Data</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>JEJANG PENDIDIKAN</th>
                                        <th>NAMA INSTITUSI</th>
                                        <th>NAMA JURUSAN</th>
                                        <th>TAHUN LULUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidateSchoolData as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->education_level }}
                                                ({{ \Str::upper($value->abbreviation) }})
                                            </td>
                                            <td>{{ $value->school_name }}</td>
                                            <td>{{ $value->major }}</td>
                                            <td>{{ $value->graduation_year }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    style="border-radius: 25%; width:35px; height: 35px;"
                                                    wire:click="viewCandidateSchool({{ $value->id }})"
                                                    data-toggle="modal" data-target="#showSchoolData"><i
                                                        class="fa-solid fa-eye" style="font-size: 15px"></i></button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    style="border-radius: 25%; width:35px; height: 35px;"
                                                    wire:click="deleteCandidateSchoolConfirmation({{ $value->id }})"
                                                    data-toggle="modal" data-target="#confirm-delete"><i
                                                        class="fa fa-trash-o" style="font-size: 15px"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mx-auto" style="display: flex; align-items: center;">
                    <button class="btn btn-primary mx-2" type="button" wire:click="prevSlide"><i
                            class="bi bi-arrow-left-short"></i>Kembali</button>
                    <button class="btn btn-primary" type="button" id="nextBtn" wire:click="nextSlide">Selanjutnya
                        <i class="bi bi-arrow-right-short"></i></button>
                </div>

            </div>

        </div>


        <!-- SLIDE 3: Data Ibu -->
        <div id="slide3" class="slide" style="{{ $currentSlide != 3 ? 'display:none;' : '' }}">
            <h2 class="form-title mb-4"><i class="bi bi-person-standing-dress"></i> DATA ORANG TUA</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" style="display:flex; align-items: center">
                                    <div>
                                        <strong class="card-title">Data Orang Tua</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-success btn-sm float-right py-2"
                                        style="border-radius: 7px" data-toggle="modal" data-target="#addParentData"
                                        wire:click="createCandidateParent"><i class="fa fa-plus"></i>&nbsp; Tambah
                                        Data</button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>HUBUNGAN</th>
                                        <th>NAMA ORANG TUA</th>
                                        <th>PENDIDIKAN TERAKHIR</th>
                                        <th>TIPE PEKERJAAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidateParentData as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Str::ucfirst($value->relationship) }}</td>
                                            <td>{{ ucwords(strtolower($value->parent_name)) }}</td>
                                            <td>{{ \Str::upper($value->parent_last_education) }}</td>
                                            <td>{{ ucwords(strtolower($value->parent_job_type)) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    style="border-radius: 25%; width:35px; height: 35px;"
                                                    data-toggle="modal" data-target="#showParentData"
                                                    wire:click="viewCandidateParent({{ $value->id }})"><i
                                                        class="fa-solid fa-eye" style="font-size: 15px"></i></button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    style="border-radius: 25%; width:35px; height: 35px;"
                                                    data-toggle="modal" data-target="#confirm-delete"
                                                    wire:click="deleteCandidateParentConfirmation({{ $value->id }})"><i
                                                        class="fa fa-trash-o" style="font-size: 15px"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mx-auto" style="display: flex; align-items: center;">
                    <button class="btn btn-primary mx-2" type="button" wire:click="prevSlide"><i
                            class="bi bi-arrow-left-short"></i>Kembali</button>
                    <a href="{{ route('dashboard.student-registration') }}" class="btn btn-success">Selesai
                        <i class="bi bi-send-arrow-up-fill"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- MODAL --}}
        <div wire:ignore.self class="modal fade" id="addSchoolData" tabindex="-1" role="dialog"
            aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Tambah Pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" wire:click="resetSchoolForm"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="jenjang-pendidikan">Jenjang Pendidikan<i>*</i></label>
                                <select name="edication_level" id="jenjang-pendidikan"
                                    class="form-control @error('abbreviation') is-invalid @enderror"
                                    wire:model="abbreviation">
                                    <option hidden>Pilih Jenjang Pendidikan</option>
                                    <option value="s1">Sarjana (S1)</option>
                                    <option value="d3">Diploma (D3)</option>
                                    <option value="smk">Sekolah Menengah Kejuruan (SMK)</option>
                                    <option value="sma">Sekolah Menengah Akhir (SMA)</option>
                                    <option value="smp">Sekolah Menengah Pertama (SMP)</option>
                                    <option value="sd">Sekolah Dasar (SD)</option>
                                </select>
                                @error('abbreviation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="jurusan">Jurusan<i>*</i></label>
                                <input type="text" id="jurusan" name="major"
                                    class="form-control @error('major') is-invalid @enderror"
                                    placeholder="Masukkan Jurusan" wire:model="major">
                                @error('major')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="nama-institusi">Nama Institusi<i>*</i></label>
                                <input type="text" id="nama-institusi" name="school_name"
                                    class="form-control @error('school_name') is-invalid @enderror"
                                    placeholder="Masukkan Nama Institusi" wire:model="school_name">
                                @error('school_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="tahun-kelulusan">Tahun Kelulusan<i>*</i></label>
                                <input type="text" id="tahun-kelulusan" name="graduation_year"
                                    class="form-control @error('graduation_year') is-invalid @enderror"
                                    placeholder="Masukkan Tahun Kelulusan" wire:model="graduation_year">
                                @error('graduation_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer row">
                        <div class="col-md-12">
                            <div class="float-right" style="align-items: center">
                                <button type="button" class="btn btn-secondary px-3 py-2" style="border-radius: 7px"
                                    data-dismiss="modal" wire:click="resetSchoolForm">Cancel</button>
                                <button type="button" class="btn btn-primary mt-0 px-3 py-2"
                                    wire:click="saveCandidateSchool" style="border-radius: 7px">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="showSchoolData" tabindex="-1" role="dialog"
            aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Detail Pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="jenjang-pendidikan">Jenjang Pendidikan</label>
                                <select name="jenjang-pendidikan" id="jenjang-pendidikan" class="form-control"
                                    wire:model="abbreviation" disabled>
                                    <option hidden>Pilih Jenjang Pendidikan</option>
                                    <option value="s1">Sarjana (S1)</option>
                                    <option value="d3">Diploma (D3)</option>
                                    <option value="smk">Sekolah Menengah Kejuruan (SMK)</option>
                                    <option value="sma">Sekolah Menengah Akhir (SMA)</option>
                                    <option value="smp">Sekolah Menengah Pertama (SMP)</option>
                                    <option value="sd">Sekolah Dasar (SD)</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" id="jurusan" name="jurusan" class="form-control"
                                    placeholder="Masukkan Jurusan" wire:model="school_name" disabled>
                            </div>
                            <div class="form-group ">
                                <label for="nama-institusi">Nama Institusi</label>
                                <input type="text" id="nama-institusi" name="nama-institusi" class="form-control"
                                    placeholder="Masukkan Nama Institusi" wire:model="graduation_year" disabled>
                            </div>
                            <div class="form-group ">
                                <label for="tahun-kelulusan">Tahun Kelulusan</label>
                                <input type="text" id="tahun-kelulusan" name="tahun-kelulusan"
                                    class="form-control" placeholder="Masukkan Tahun Kelulusan" wire:model="major"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer row">
                        <div class="col-md-12">
                            <div class="float-right" style="align-items: center">
                                <button type="button" class="btn btn-secondary px-3 py-2" style="border-radius: 7px"
                                    data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary mt-0 px-3 py-2"
                                    style="border-radius: 7px">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="addParentData" tabindex="-1" role="dialog"
            aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Tambah Data Orang Tua</h5>
                        <button type="button" class="close" data-dismiss="modal" wire:click="resetParentForm"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="relationship">Hubungan</label>
                                <select name="relationship" id="relationship"
                                    class="form-control @error('relationship') is-invalid @enderror"
                                    wire:model="relationship">
                                    <option hidden>Pilih Hubungan</option>
                                    <option value="ayah">Ayah</option>
                                    <option value="ibu">Ibu</option>
                                    <option value="wali">Wali</option>
                                </select>
                                @error('relationship')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="parent-name">Nama Orang Tua / Wali</label>
                                <input type="text" id="parent-name" name="parent-name"
                                    class="form-control @error('parent_name') is-invalid @enderror"
                                    placeholder="Masukkan Nama Orang Tua / Wali" wire:model="parent_name">
                                @error('parent_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="last-education">Pendidikan Terakhir</label>
                                <select name="last-education" id="last-education"
                                    class="form-control @error('parent_last_education') is-invalid @enderror"
                                    wire:model="parent_last_education">
                                    <option hidden>Pilih Pendidikan Terakhir</option>
                                    <option value="s1">Sarjana (S1)</option>
                                    <option value="d3">Diploma (D3/D4)</option>
                                    <option value="smk">Sekolah Menengah Kejuruan (SMK)</option>
                                    <option value="sma">Sekolah Menengah Akhir (SMA)</option>
                                    <option value="smp">Sekolah Menengah Pertama (SMP)</option>
                                    <option value="sd">Sekolah Dasar (SD)</option>
                                </select>
                                @error('parent_last_education')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="parent-job-type">Jenis Pekerjaan</label>
                                <input type="text" id="parent-job-type" name="parent-job-type"
                                    class="form-control @error('parent_job_type') is-invalid @enderror"
                                    placeholder="Masukkan Jenis Pekerjaan" wire:model="parent_job_type">
                                @error('parent_job_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent-email">Email</label>
                                <input type="email" id="parent-email" name="parent-email"
                                    class="form-control @error('parent_email') is-invalid @enderror"
                                    placeholder="Masukkan Email" wire:model="parent_email">
                                @error('parent_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent-phone">No Handphone</label>
                                <input type="number" id="parent-phone" name="parent-phone"
                                    class="form-control @error('parent_phone_number') is-invalid @enderror"
                                    placeholder="Masukkan No Handphone" wire:model="parent_phone_number">
                                @error('parent_phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer row">
                            <div class="col-md-12">
                                <div class="float-right" style="align-items: center">
                                    <button type="button" class="btn btn-secondary px-3 py-2"
                                        style="border-radius: 7px" data-dismiss="modal"
                                        wire:click="resetParentForm">Cancel</button>
                                    <button type="button" class="btn btn-primary mt-0 px-3 py-2"
                                        style="border-radius: 7px" wire:click="saveCandidateParent">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="showParentData" tabindex="-1" role="dialog"
            aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Detail Orang Tua</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="relationship">Hubungan</label>
                                <select name="relationship" id="relationship" class="form-control"
                                    wire:model="relationship" disabled>
                                    <option hidden>Pilih Hubungan</option>
                                    <option value="ayah">Ayah</option>
                                    <option value="ibu">Ibu</option>
                                    <option value="wali">Wali</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="parent-name">Nama Orang Tua / Wali</label>
                                <input type="text" id="parent-name" name="parent-name" class="form-control"
                                    placeholder="Masukkan Nama Orang Tua / Wali" wire:model="parent_name" disabled>
                            </div>
                            <div class="form-group ">
                                <label for="last-education">Pendidikan Terakhir</label>
                                <select name="last-education" id="last-education" class="form-control"
                                    wire:model="parent_last_education" disabled>
                                    <option hidden>Pilih Pendidikan Terakhir</option>
                                    <option value="sarjana">Sarjana (S1)</option>
                                    <option value="diploma">Diploma (D3/D4)</option>
                                    <option value="smk">Sekolah Menengah Kejuruan (SMK)</option>
                                    <option value="sma">Sekolah Menengah Akhir (SMA)</option>
                                    <option value="smp">Sekolah Menengah Pertama (SMP)</option>
                                    <option value="sd">Sekolah Dasar (SD)</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="parent-job-type">Jenis Pekerjaan</label>
                                <input type="text" id="parent-job-type" name="parent-job-type"
                                    class="form-control" placeholder="Masukkan Jenis Pekerjaan"
                                    wire:model="parent_job_type" disabled>
                            </div>
                            <div class="form-group">
                                <label for="parent-email">Email</label>
                                <input type="email" id="parent-email" name="parent-email" class="form-control"
                                    placeholder="Masukkan Email" wire:model="parent_email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="parent-phone">No Handphone</label>
                                <input type="number" id="parent-phone" name="parent-phone" class="form-control"
                                    placeholder="Masukkan No Handphone" wire:model="parent_phone_number" disabled>
                            </div>
                        </div>
                        <div class="modal-footer row">
                            <div class="col-md-12">
                                <div class="float-right" style="align-items: center">
                                    <button type="button" class="btn btn-secondary px-3 py-2"
                                        style="border-radius: 7px" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary mt-0 px-3 py-2"
                                        style="border-radius: 7px">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div wire:ignore.self class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
            aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body" style="text-align: center">
                        <div style="">
                            <i class="fa fa-question-circle mb-2" style="font-size: 100px"></i>
                            <h3>Konfirmasi</h3>
                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                        </div>
                    </div>
                    <div class="modal-footer row"
                        style="display: flex; justify-content: center; align-items: center;">
                        <button type="button" class="btn btn-secondary px-3 py-2" style="border-radius: 7px"
                            data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary mt-0 px-3 py-2"
                            @if ($candidateSchoolId) wire:click="deleteCandidateSchool" @endif
                            @if ($candidateParentId) wire:click="deleteCandidateParent" @endif
                            style="border-radius: 7px" data-dismiss="modal">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
