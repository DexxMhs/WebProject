<div class="mb-3">
    <label for="group" class="form-label">Group</label>
    <input type="text" name="groupby" id="group" class="form-control @error('group') is-invalid @enderror"
        value="{{ old('group', $permission->groupby ?? '') }}" required>
    @error('group')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nama Permission</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $permission->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
