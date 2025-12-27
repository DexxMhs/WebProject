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
                            <h1>Gedung Kampus</h1>
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
                        <strong class="card-title mb-0" style="">Data Gedung Kampus</strong>
                        @can('create_buildings')
                            <a href="{{ route('dashboard.buildings.create') }}" class="btn btn-primary mt-0">Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Kode Gedung</th>
                                    <th>Nama Gedung</th>
                                    <th>Prodi</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buildings  as $building)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="img-cell">
                                            @if ($building->photo)
                                                <img src="{{ asset('storage/' . $building->photo) }}" alt="photo"
                                                    class="card-img-top" style="width: 100px; height: auto;">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $building->code }}</td>
                                        <td>{{ $building->name }}</td>
                                        <td>
                                            @foreach ($building->studyPrograms as $program)
                                                <span class="badge badge-primary">{{ $program->name }}
                                                    ({{ $program->degreeLevel->code }})
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $building->address }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                                @can('view_buildings')
                                                    <a href="{{ route('dashboard.buildings.edit', $building) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                @endcan
                                                @can('delete_buildings')
                                                    <form action="{{ route('dashboard.buildings.destroy', $building) }}"
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
                                        <td colspan="7" style="text-align: center;">No building data found.</td>
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
