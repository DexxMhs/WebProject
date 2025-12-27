<div class="mb-3">
    <label for="name" class="form-label">Nama Semester</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $academicSemester->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="code" class="form-label">Kode Semester</label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $academicSemester->code ?? '') }}">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="start_date" class="form-label">Tanggal Mulai</label>
    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
        value="{{ old('start_date', $academicSemester->start_date ?? '') }}">
    @error('start_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="end_date" class="form-label">Tanggal Berakhir</label>
    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
        value="{{ old('end_date', $academicSemester->end_date ?? '') }}">
    @error('end_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror">
        <option value="active" {{ old('status', $academicSemester->status ?? '') == 'active' ? 'selected' : '' }}>
            Active</option>
        <option value="inactive" {{ old('status', $academicSemester->status ?? '') == 'inactive' ? 'selected' : '' }}>
            Inactive</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
