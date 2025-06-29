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
                            <h1>Permission</h1>
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
                        <strong class="card-title mb-0" style="">Data Permission</strong>

                        <a href="{{ route('dashboard.permissions.create') }}" class="btn btn-primary mt-0">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Group</th>
                                    <th>Name</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions  as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->groupby }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                                <a href="{{ route('dashboard.permissions.edit', $permission) }}"
                                                    class="btn btn-outline-primary btn-sm">Edit</a>
                                                <form action="{{ route('dashboard.permissions.destroy', $permission) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apa kamu yakin akan menghapus ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center;">No permission data found.</td>
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
