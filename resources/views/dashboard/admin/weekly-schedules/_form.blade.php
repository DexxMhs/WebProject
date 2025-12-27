<div class="mb-3">
    <label for="class_id" class="form-label">Kelas<i class="req-i">*</i></label>
    <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror">
        <option value="">-- Select Class --</option>
        @foreach ($classes as $item)
            <option value="{{ $item->id }}"
                {{ old('class_id', $weeklySchedule->class_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    @error('class_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="course_id" class="form-label">Mata Kuliah<i class="req-i">*</i></label>
    <select name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror">
        <option value="">-- Select Course --</option>
        @foreach ($courses as $item)
            <option value="{{ $item->id }}"
                {{ old('course_id', $weeklySchedule->course_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    @error('course_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="lecturer_id" class="form-label">Dosen<i class="req-i">*</i></label>
    <select name="lecturer_id" id="lecturer_id" class="form-control @error('lecturer_id') is-invalid @enderror">
        <option value="">-- Select Lecturer --</option>
        @foreach ($lecturers as $item)
            <option value="{{ $item->id }}"
                {{ old('lecturer_id', $weeklySchedule->lecturer_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    @error('lecturer_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="room_id" class="form-label">Ruang Kelas<i class="req-i">*</i></label>
    <select name="room_id" id="room_id" class="form-control @error('room_id') is-invalid @enderror">
        <option value="">-- Select Room --</option>
        @foreach ($rooms as $item)
            <option value="{{ $item->id }}"
                {{ old('room_id', $weeklySchedule->room_id ?? '') == $item->id ? 'selected' : '' }}>
                {{ $item->code }}
            </option>
        @endforeach
    </select>
    @error('room_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day" class="form-label">Hari<i class="req-i">*</i></label>
    <select name="day" id="day" class="form-control @error('day') is-invalid @enderror">
        @php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        @endphp
        <option value="">-- Select Day --</option>
        @foreach ($days as $day)
            <option value="{{ $day }}"
                {{ old('day', $weeklySchedule->day ?? '') == $day ? 'selected' : '' }}>
                {{ $day }}
            </option>
        @endforeach
    </select>
    @error('day')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="start_time" class="form-label">Jam Mulai<i class="req-i">*</i></label>
    <input type="time" name="start_time" id="start_time"
        class="form-control @error('start_time') is-invalid @enderror"
        value="{{ old('start_time', isset($weeklySchedule->start_time) ? \Carbon\Carbon::parse($weeklySchedule->start_time)->format('H:i') : '') }}">
    @error('start_time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="end_time" class="form-label">Jam Selesai<i class="req-i">*</i></label>
    <input type="time" name="end_time" id="end_time" class="form-control @error('end_time') is-invalid @enderror"
        value="{{ old('start_time', isset($weeklySchedule->end_time) ? \Carbon\Carbon::parse($weeklySchedule->end_time)->format('H:i') : '') }}">
    @error('end_time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" rows="2">{{ old('notes', $weeklySchedule->notes ?? '') }}</textarea>
    @error('notes')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
