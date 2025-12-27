@extends('dashboard.layouts.dashboard-main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Daftar Kuliah</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    @include('dashboard.partials._message')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">
                                <img class="my-auto" src="{{ asset('images/student-registration.jpeg') }}" alt="">
                            </div>
                            <div class="col-md-8">
                                @if (empty($candidate->study_program_id))
                                    @livewire('registration-study-program-form')
                                @else
                                    @if ($candidate->registration_status == 'pending')
                                        <div class="alert alert-warning d-flex align-items-center" role="alert"
                                            style="gap: 10px;">
                                            <i class="bi bi-hourglass-split me-2" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <strong>Registrasi Sedang Diproses</strong><br>
                                                Harap tunggu konfirmasi dari administrator. Bila Disetujui maka akan
                                                langsung ke halaman mahasiswa.
                                            </div>
                                        </div>
                                    @elseif ($candidate->registration_status == 'declined')
                                        <div class="alert alert-danger  d-flex align-items-center" role="alert"
                                            style="gap: 10px;">
                                            <i class="bi bi-hourglass-split me-2" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <strong>Registrasi Ditolak</strong><br>
                                                Mohon maaf, pendaftaran Anda telah ditolak. Silakan hubungi admin untuk
                                                informasi lebih lanjut atau lakukan pendaftaran ulang jika diizinkan.
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
