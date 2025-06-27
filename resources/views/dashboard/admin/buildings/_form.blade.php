<div class="mb-3">
    <label for="code" class="form-label">Kode<i class="req-i">*</i></label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $building->code ?? '') }}">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Name<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $building->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
        value="{{ old('address', $building->address ?? '') }}">
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $building->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
    @if (!empty($building->photo))
        <div class="mb-2">
            <img src="{{ asset('storage/' . $building->photo) }}" width="100">
        </div>
    @endif
    <input type="file" name="photo" class="form-control-file">
    @error('photo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="study_program_ids" class="form-label">Study Programs</label>
    <select name="study_program_ids[]" class="form-control @error('study_program_ids') is-invalid @enderror" multiple>
        @foreach ($studyPrograms as $program)
            <option value="{{ $program->id }}"
                {{ collect(old('study_program_ids', $building->studyPrograms->pluck('id') ?? []))->contains($program->id) ? 'selected' : '' }}>
                {{ $program->name }}
            </option>
        @endforeach
    </select>
    @error('study_program_ids')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
