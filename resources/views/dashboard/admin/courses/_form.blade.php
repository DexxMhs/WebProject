<div class="mb-3">
    <label for="code" class="form-label">Kode Matkul<i class="req-i">*</i></label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $course->code ?? '') }}">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nama Matkul<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $course->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="credit" class="form-label">Credit (SKS)<i class="req-i">*</i></label>
    <input type="number" name="credit" class="form-control @error('credit') is-invalid @enderror"
        value="{{ old('credit', $course->credit ?? '') }}" min="1">
    @error('credit')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi (Optional)</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
