<div class="mb-3">
    <label for="name" class="form-label">Nama Role<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $role->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="label" class="form-label">Label Role</label>
    <input type="text" name="label" class="form-control @error('label') is-invalid @enderror"
        value="{{ old('label', $role->label ?? '') }}">
    @error('label')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row form-group">
    <label class="col-sm-12 form-control-label fw-bold mb-3">Permission</label>

    @foreach ($getPermission as $value)
        <div class="col-md-12 mb-4">
            <div class="">
                <h6 class="mb-3 fw-semibold text-primary">
                    {{ $value['name'] }}
                </h6>

                <div class="row">
                    @foreach ($value['group'] as $group)
                        @if (Request::segment(4) == 'edit')
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
                        @endif
                        <div class="col-md-3 mb-2">
                            <label class="switch switch-default switch-primary d-flex align-items-center">
                                <input type="checkbox" class="switch-input mr-1" name="permission_id[]"
                                    value="{{ $group['id'] }}"
                                    @if (Request::segment(4) == 'edit') {{ $checked }} @endif>
                                <span class="switch-label me-2"></span>
                                <span class="switch-handle me-2"></span>
                                <span>{{ $group['name'] }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
