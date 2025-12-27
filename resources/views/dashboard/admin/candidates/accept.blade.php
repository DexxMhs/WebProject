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
    @include('dashboard.partials._message')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
                <strong class="card-title " style="margin-bottom: 0px">Form Calon Mahasiswa</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.student-candidates.accept', $candidate->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM<i class="req-i">*</i></label>
                        <input type="text" name="nim" id="nim" class="form-control "
                            value="{{ $nim }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="class_id" class="form-label">Kelas<i class="req-i">*</i></label>
                        <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display: flex; justify-content: center; align-items: center; gap: 7px;">
                        <button class="btn btn-outline-success">Accept</button>
                        <a href="{{ route('dashboard.student-candidates.index') }}"
                            class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
