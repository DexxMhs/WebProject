<div class="mb-3">
    <label for="code" class="form-label">Kode<i class="req-i">*</i></label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $degreeLevel->code ?? '') }}" required>
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nama Gelar<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $degreeLevel->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="duration_years" class="form-label">Lama Waktu (Tahun)</label>
    <input type="number" name="duration_years" class="form-control @error('duration_years') is-invalid @enderror"
        value="{{ old('duration_years', $degreeLevel->duration_years ?? '') }}">
    @error('duration_years')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Keterangan</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $degreeLevel->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="file" id="file-input" name="image" class="form-control-file" />
    @if (!empty($degreeLevel->image))
        <img src="{{ asset('storage/' . $degreeLevel->image) }}" alt="" width="100" class="mt-2">
    @endif
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
