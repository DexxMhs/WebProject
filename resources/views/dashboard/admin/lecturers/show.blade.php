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
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
                <strong class="card-title " style="margin-bottom: 0px">Profil Dosen</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <div class="round-img">
                        <img src="{{ $lecturer->image_url }}" alt="Profile Photo" width="150"
                            class="img-thumbnail rounded-circle mx-auto d-block"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h5 class="text-sm-center mt-2 mb-1">{{ ucwords($lecturer->name) }}</h5>
                </div>
                <hr>
                <ul class="list-group">
                    <li class="list-group-item"><strong>NIDN:</strong> {{ $lecturer->nidn }}</li>
                    <li class="list-group-item"><strong>Nama:</strong> {{ $lecturer->name }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $lecturer->email }}</li>
                    <li class="list-group-item"><strong>No. HP:</strong> {{ $lecturer->phone }}</li>
                    <li class="list-group-item"><strong>Gender:</strong> {{ ucfirst($lecturer->gender) }}</li>
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $lecturer->address }}</li>
                    <li class="list-group-item"><strong>Lokasi Bekerja:</strong>
                        @foreach ($lecturer->buildings as $building)
                            <span class="badge badge-primary">{{ $building->name }}
                                ({{ $building->code }})
                            </span>
                        @endforeach
                    </li>
                    <li class="list-group-item"><strong>Matkul yang Diajarkan:</strong>
                        @foreach ($lecturer->courses as $course)
                            <span class="badge badge-primary">{{ $course->name }}
                            </span>
                        @endforeach
                    </li>
                </ul>
                <hr>
                <div class="mt-4" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                    @can('edit_lecturers')
                        <a href="{{ route('dashboard.lecturers.edit', $lecturer) }}" class="btn btn-outline-primary">Edit</a>
                    @endcan
                    <a href="{{ route('dashboard.lecturers.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
