@extends('dashboard.layouts.dashboard-main')

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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Jadwal Mingguan</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.weekly-schedules.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @livewire('weekly-schedule-form')
                        {{-- @include('dashboard.admin.weekly-schedules._form', [
                            'weeklySchedule' => new \App\Models\WeeklySchedule(),
                        ]) --}}
                        <button type="submit" class="btn btn-primary" style="margin-top: 0px">Save</button>
                        <a href="{{ route('dashboard.weekly-schedules.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
