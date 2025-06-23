<div class="mb-3">
    <label for="code" class="form-label">Kode</label>
    <input type="text" name="code" class="form-control" value="{{ old('code', $degreeLevel->code ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nama Gelar</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $degreeLevel->name ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="duration_years" class="form-label">Lama Waktu (Tahun)</label>
    <input type="number" name="duration_years" class="form-control"
        value="{{ old('duration_years', $degreeLevel->duration_years ?? '') }}">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Keterangan</label>
    <textarea name="description" class="form-control">{{ old('description', $degreeLevel->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="file" id="file-input" name="image" class="form-control-file" />
    @if (!empty($degreeLevel->image))
        <img src="{{ asset('storage/' . $degreeLevel->image) }}" alt="" width="100" class="mt-2">
    @endif
</div>
