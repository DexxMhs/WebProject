<div class="mb-3">
    <label for="course_id" class="form-label">Mata Kuliah<i class="req-i">*</i></label>
    <select name="course_id" class="form-control @error('course_id') is-invalid @enderror">
        <option value="">-- Select Course --</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}"
                {{ old('course_id', $curriculum->course_id ?? '') == $course->id ? 'selected' : '' }}>
                {{ $course->name }} ({{ $course->code }})
            </option>
        @endforeach
    </select>
    @error('course_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="study_program_id" class="form-label">Program Studi<i class="req-i">*</i></label>
    <select name="study_program_id" class="form-control @error('study_program_id') is-invalid @enderror">
        <option value="">-- Select Study Program --</option>
        @foreach ($studyPrograms as $program)
            <option value="{{ $program->id }}"
                {{ old('study_program_id', $curriculum->study_program_id ?? '') == $program->id ? 'selected' : '' }}>
                {{ $program->name }} ({{ $program->code }})
            </option>
        @endforeach
    </select>
    @error('study_program_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="semester_id" class="form-label">Semester<i class="req-i">*</i></label>
    <select name="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
        <option value="">-- Select Semester --</option>
        @foreach ($semesters as $smt)
            <option value="{{ $smt->id }}"
                {{ old('semester_id', $curriculum->semester_id ?? '') == $smt->id ? 'selected' : '' }}>
                {{ $smt->name }}
            </option>
        @endforeach
    </select>
    @error('semester_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="academic_semester_id" class="form-label">Semester Akademik<i class="req-i">*</i></label>
    <select name="academic_semester_id" class="form-control @error('academic_semester_id') is-invalid @enderror">
        <option value="">-- Select Academic Semester --</option>
        @foreach ($academicSemesters as $acad)
            <option value="{{ $acad->id }}"
                {{ old('academic_semester_id', $curriculum->academic_semester_id ?? '') == $acad->id ? 'selected' : '' }}>
                {{ $acad->name }} ({{ $acad->code }})
            </option>
        @endforeach
    </select>
    @error('academic_semester_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
