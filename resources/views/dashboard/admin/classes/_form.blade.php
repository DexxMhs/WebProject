<div class="mb-3">
    <label for="name" class="form-label">Nama Kelas</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
        value="{{ old('name', $class->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="study_program_id" class="form-label">Program Studi</label>
    <select name="study_program_id" id="study_program_id"
        class="form-control @error('study_program_id') is-invalid @enderror" required>
        <option value="">-- Select Program --</option>
        @foreach ($studyPrograms as $program)
            <option value="{{ $program->id }}"
                {{ old('study_program_id', $class->study_program_id ?? '') == $program->id ? 'selected' : '' }}>
                {{ $program->name }} ({{ $program->code }})
            </option>
        @endforeach
    </select>
    @error('study_program_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="academic_semester_id" class="form-label">Semester Akademik</label>
    <select name="academic_semester_id" id="academic_semester_id"
        class="form-control @error('academic_semester_id') is-invalid @enderror" required>
        <option value="">-- Select Semester --</option>
        @foreach ($academicSemesters as $semester)
            <option value="{{ $semester->id }}"
                {{ old('academic_semester_id', $class->academic_semester_id ?? '') == $semester->id ? 'selected' : '' }}>
                {{ $semester->name }}
            </option>
        @endforeach
    </select>
    @error('academic_semester_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
