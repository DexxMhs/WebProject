@extends('dashboard.layouts.dashboard-main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dosen</h1>
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
                    <strong>Edit Dosen</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.lecturers.update', $lecturer) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.admin.lecturers._form', ['lecturer' => $lecturer])
                        <button type="submit" class="btn btn-success" style="margin-top: 0px">Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
