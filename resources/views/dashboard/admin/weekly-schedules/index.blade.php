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
                            <h1>Jadwal Mingguan</h1>
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
                        <strong class="card-title mb-0" style="">Data Jadwal Mingguan</strong>
                        @can('create_weekly-schedules')
                            <a href="{{ route('dashboard.weekly-schedules.create') }}" class="btn btn-primary mt-0">Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="max-width: 45px">No.</th>
                                    <th>Kelas</th>
                                    <th>Matkul</th>
                                    <th>Dosen</th>
                                    <th>Ruang Kelas</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Notes</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules  as $index => $schedule)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $schedule->class->name ?? '-' }}</td>
                                        <td>{{ $schedule->course->name ?? '-' }}</td>
                                        <td>{{ $schedule->lecturer->name ?? '-' }}</td>
                                        <td>{{ $schedule->room->code ?? '-' }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                                        <td>{{ $schedule->notes }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 5px;">
                                                @can('edit_weekly-schedules')
                                                    <a href="{{ route('dashboard.weekly-schedules.edit', $schedule) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                @endcan
                                                @can('delete_weekly-schedules')
                                                    <form action="{{ route('dashboard.weekly-schedules.destroy', $schedule) }}"
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
                                        <td colspan="9" style="text-align: center;">No schedule data found.</td>
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
