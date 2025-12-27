@extends('dashboard.layouts.dashboard-main')

@section('css')
    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-primary {
            margin-top: 0;
        }

        .img-cell {
            width: 100px;
            padding: 0;
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection

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
    @include('dashboard.partials._message')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong class="card-title mb-0" style="">Data Program Studi</strong>
                        @can('create_study-programs')
                            <a href="{{ route('dashboard.study-programs.create') }}" class="btn btn-primary mt-0">Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Prodi</th>
                                    <th>Nama Prodi</th>
                                    <th>Fakultas</th>
                                    <th>Derajat</th>
                                    <th>Status</th>
                                    <th>Akreditas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studyPrograms as $program)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $program->code }}</td>
                                        <td>{{ $program->name }}</td>
                                        <td>{{ $program->faculty->name ?? '-' }}</td>
                                        <td>{{ $program->degreeLevel->name ?? '-' }}</td>
                                        <td>{{ ucfirst($program->status) }}</td>
                                        <td>{{ $program->accreditation ?? '-' }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                                @can('view_study-programs')
                                                    <a href="{{ route('dashboard.study-programs.show', $program) }}"
                                                        class="btn btn-outline-success btn-sm">Show</a>
                                                @endcan
                                                @can('edit_study-programs')
                                                    <a href="{{ route('dashboard.study-programs.edit', $program) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                @endcan
                                                @can('delete_study-programs')
                                                    <form action="{{ route('dashboard.study-programs.destroy', $program) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Apa kamu yakin akan menghapus ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
