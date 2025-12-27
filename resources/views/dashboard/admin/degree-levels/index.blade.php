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
                            <h1>Gelar</h1>
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
                        <strong class="card-title mb-0" style="">Data Gelar</strong>
                        @can('create_degree-levels')
                            <a href="{{ route('dashboard.degree-levels.create') }}" class="btn btn-primary mt-0">Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Nama Gelar (Kode)</th>
                                    <th>Lama Waktu (Tahun)</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($degreeLevels as $degree)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="img-cell">
                                            @if ($degree->image)
                                                <img src="{{ asset('storage/' . $degree->image) }}" class="card-img-top"
                                                    alt="{{ $degree->name }}" style="width: 100px; height: auto;">
                                            @endif
                                        </td>
                                        <td>{{ $degree->name }} ({{ $degree->code }})</td>
                                        <td>{{ $degree->duration_years }}</td>
                                        <td style="max-width: 600px">{{ $degree->description }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                                @can('edit_degree-levels')
                                                    <a href="{{ route('dashboard.degree-levels.edit', $degree) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                @endcan
                                                @can('delete_degree-levels')
                                                    <form action="{{ route('dashboard.degree-levels.destroy', $degree) }}"
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
