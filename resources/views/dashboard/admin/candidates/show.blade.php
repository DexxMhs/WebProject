@extends('dashboard.layouts.dashboard-main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Calon Mahasiswa</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
                <strong class="card-title " style="margin-bottom: 0px">Profil Calon Mahasiswa</strong>
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>Nama:</strong> {{ $candidate->full_name }}</p>
                        <p><strong>Email:</strong> {{ $candidate->email }}</p>
                        <p><strong>Alamat:</strong> {{ $candidate->address }}</p>
                        <p><strong>Status:</strong> {{ $candidate->registration_status }}</p>
                        {{-- Tambahkan field lainnya sesuai kebutuhan --}}
                    </div>
                </div>

                <div style="display: flex; justify-content: center; align-items: center; gap: 7px;">
                    @if ($candidate->registration_status === 'pending')
                        <a href="{{ route('dashboard.student-candidates.accept-form', $candidate->id) }}"
                            class="btn btn-outline-success">Approve</a>

                        <form action="{{ route('dashboard.student-candidates.decline', $candidate->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Decline</button>
                        </form>
                    @endif

                    <a href="{{ route('dashboard.student-candidates.index') }}"
                        class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
