@extends('dashboard.layouts.dashboard-main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Program Studi</h1>
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
                <strong class="card-title " style="margin-bottom: 0px">Detail Prodi</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Code</th>
                        <td>{{ $studyProgram->code }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $studyProgram->name }}</td>
                    </tr>
                    <tr>
                        <th>Faculty</th>
                        <td>{{ $studyProgram->faculty->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Degree Level</th>
                        <td>{{ $studyProgram->degreeLevel->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Head of Program</th>
                        <td>{{ $studyProgram->headOfProgram->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Accreditation</th>
                        <td>{{ $studyProgram->accreditation ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Established Date</th>
                        <td>{{ $studyProgram->established_date ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ ucfirst($studyProgram->status) }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            @if ($studyProgram->image)
                                <img src="{{ asset('storage/' . $studyProgram->image) }}" width="150">
                            @else
                                <span>No image</span>
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
                <div class="mt-4" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                    @can('edit_study-programs')
                        <a href="{{ route('dashboard.study-programs.edit', $studyProgram) }}"
                            class="btn btn-outline-primary">Edit</a>
                    @endcan
                    <a href="{{ route('dashboard.study-programs.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
