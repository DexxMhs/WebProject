@extends('dashboard.layouts.dashboard-main')

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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Gelar</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.degree-levels.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.admin.degree-levels._form')
                        <button type="submit" class="btn btn-primary" style="margin-top: 0px">Save</button>
                        <a href="{{ route('dashboard.degree-levels.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
