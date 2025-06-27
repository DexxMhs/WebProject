<div class="mb-3">
    <label for="number" class="form-label">Semester Number</label>
    <input type="number" name="number" class="form-control @error('number') is-invalid @enderror"
        value="{{ old('number', $semester->number ?? '') }}">
    @error('number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Semester Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $semester->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
