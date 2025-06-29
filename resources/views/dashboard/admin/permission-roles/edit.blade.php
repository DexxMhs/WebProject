@extends('panel.layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Edit Role</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="height: 100vh">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><strong>Edit Role</strong></div>
                <div class="card-body card-block">
                    <form action="{{ route('roles.update', $getRecord->id) }}" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class="form-control-label">Name</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" id="text-input" name="name" required placeholder="Text"
                                    class="form-control" value="{{ $getRecord->name }}" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="text-input" class="col-sm-12 form-control-label">Permission</label>
                            @foreach ($getPermission as $value)
                                <div class="col-md-12">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-3">
                                            {{ $value['name'] }}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                @foreach ($value['group'] as $group)
                                                    @php
                                                        $checked = '';
                                                    @endphp
                                                    @foreach ($getRolePermission as $role)
                                                        @if ($role->permission_id == $group['id'])
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <div class="col-md-3">
                                                        <label class="switch switch-default switch-primary mr-2"><input
                                                                type="checkbox" class="switch-input" {{ $checked }}
                                                                value="{{ $group['id'] }}" name="permission_id[]"> <span
                                                                class="switch-label"></span> {{ $group['name'] }} <span
                                                                class="switch-handle"></span></label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-sm-12" style="text-align: right">
                                <button type="submit" class="btn btn-primary">
                                    update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
