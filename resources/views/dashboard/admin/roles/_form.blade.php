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
