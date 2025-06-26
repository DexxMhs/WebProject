@php
    $accreditationOptions = ['A', 'B', 'C', 'Good', 'Very Good', 'Excellent'];
    $statusOptions = ['active' => 'Active', 'inactive' => 'Inactive'];
@endphp

<div class="mb-3">
    <label>Code<i class="req-i">*</i></label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $studyProgram->code ?? '') }}">
    @error('code')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Name<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $studyProgram->name ?? '') }}">
    @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Faculty<i class="req-i">*</i></label>
    <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror">
        <option value="">-- Select Faculty --</option>
        @foreach ($faculties as $faculty)
            <option value="{{ $faculty->id }}"
                {{ old('faculty_id', $studyProgram->faculty_id ?? '') == $faculty->id ? 'selected' : '' }}>
                {{ $faculty->name }}
            </option>
        @endforeach
    </select>
    @error('faculty_id')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Degree Level<i class="req-i">*</i></label>
    <select name="degree_level_id" class="form-control @error('degree_level_id') is-invalid @enderror">
        <option value="">-- Select Degree Level --</option>
        @foreach ($degreeLevels as $degree)
            <option value="{{ $degree->id }}"
                {{ old('degree_level_id', $studyProgram->degree_level_id ?? '') == $degree->id ? 'selected' : '' }}>
                {{ $degree->name }} ({{ $degree->code }})
            </option>
        @endforeach
    </select>
    @error('degree_level_id')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Head of Program</label>
    <select name="head_of_program_id" class="form-control @error('head_of_program_id') is-invalid @enderror">
        <option value="">-- Select Lecturer --</option>
        @foreach ($lecturers as $lecturer)
            <option value="{{ $lecturer->id }}"
                {{ old('head_of_program_id', $studyProgram->head_of_program_id ?? '') == $lecturer->id ? 'selected' : '' }}>
                {{ $lecturer->name }}
            </option>
        @endforeach
    </select>
    @error('head_of_program_id')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Accreditation</label>
    <select name="accreditation" class="form-control @error('accreditation') is-invalid @enderror">
        <option value="">-- Select Accreditation --</option>
        @foreach ($accreditationOptions as $option)
            <option value="{{ $option }}"
                {{ old('accreditation', $studyProgram->accreditation ?? '') == $option ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
    @error('accreditation')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Established Date</label>
    <input type="date" name="established_date" class="form-control @error('established_date') is-invalid @enderror"
        value="{{ old('established_date', $studyProgram->established_date ?? '') }}">
    @error('established_date')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror">
        @foreach ($statusOptions as $value => $label)
            <option value="{{ $value }}"
                {{ old('status', $studyProgram->status ?? 'active') == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('status')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label>Keterangan</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $studyProgram->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="image" class="form-control-file">
    @if (!empty($studyProgram->image))
        <img src="{{ asset('storage/' . $studyProgram->image) }}" width="100" class="mt-2">
    @endif
    @error('photo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
