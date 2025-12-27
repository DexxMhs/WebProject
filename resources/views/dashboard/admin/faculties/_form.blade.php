<div class="mb-3">
    <label>Kode Fakultas<i class="req-i">*</i></label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $faculty->code ?? '') }}">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Nama Fakultas<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $faculty->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Keterangan</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $faculty->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Gambar</label>
    <input type="file" name="image" class="form-control-file">
    @if (!empty($faculty->image))
        <img src="{{ asset('storage/' . $faculty->image) }}" alt="" width="100" class="mt-2">
    @endif
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
