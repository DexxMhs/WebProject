<div class="mb-3">
    <label for="name" class="form-label">Nama Semester</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $semester->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="code" class="form-label">Kode Semester</label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $semester->code ?? '') }}">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="order" class="form-label">Order</label>
    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
        value="{{ old('order', $semester->order ?? 1) }}">
    @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
