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
                            <h1>Jadwal Kuliah</h1>
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
            @forelse ($weeklySchedules  as $schedule)
                <div class="col-md-4" style="">
                    <div class="card"
                        style="border-radius: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); overflow: hidden;">
                        <div class="card-header" style="display: flex; flex-direction: column; align-items: center;">
                            <h3 style="font-weight: bold; font-size: larger;">{{ strtoupper($schedule->course->name) }}</h3>
                            @php
                                $days = [
                                    'Monday' => 'Senin',
                                    'Tuesday' => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Kamis',
                                    'Friday' => 'Jumat',
                                    'Saturday' => 'Sabtu',
                                    'Sunday' => 'Minggu',
                                ];

                            @endphp
                            <p style="margin-bottom: 0px;">{{ $days[$schedule->day] ?? $schedule->day }},
                                {{ $schedule->start_time }} -
                                {{ $schedule->end_time }}</p>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless mb-0" style="table-layout: auto; width: auto;">
                                <tbody>
                                    <tr>
                                        <td><strong>Nama Dosen</strong></td>
                                        <td>: {{ ucwords($schedule->lecturer->name) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>SKS</strong></td>
                                        <td>: {{ $schedule->course->credit }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ruang Kelas</strong></td>
                                        <td>: {{ $schedule->room->code }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kode Matkul</strong></td>
                                        <td>: {{ $schedule->course->code }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse ( as )

        </div>
    </div>
@endsection
