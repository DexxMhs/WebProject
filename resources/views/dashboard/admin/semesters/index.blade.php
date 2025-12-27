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
                            <h1>Semester</h1>
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
                        <strong class="card-title mb-0" style="">Data Semester</strong>
                        @can('create_semesters')
                            <a href="{{ route('dashboard.semesters.create') }}" class="btn btn-primary mt-0">Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Nama Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($semesters as $semester)
                                    <tr>
                                        <td>{{ $semester->number }}</td>
                                        <td>{{ $semester->name }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                                @can('edit_semesters')
                                                    <a href="{{ route('dashboard.semesters.edit', $semester) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                @endcan
                                                @can('delete_semesters')
                                                    <form action="{{ route('dashboard.semesters.destroy', $semester) }}"
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
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center;">No semesters found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
