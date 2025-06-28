<form action="{{ route('dashboard.student-registration.store') }}" method="POST">
    @csrf

    {{-- Building --}}
    <div class="mb-3">
        <label for="building_id" class="form-label">Lokasi Kampus<i class="req-i">*</i></label>
        <select wire:model.lazy="building_id" name="building_id" id="building_id"
            class="form-control @error('building_id') is-invalid @enderror">
            <option value="">-- Pilih Lokasi Kampus --</option>
            @foreach ($buildings as $building)
                <option value="{{ $building->id }}">{{ $building->name }}</option>
            @endforeach
        </select>
        @error('building_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Degree Level --}}
    <div class="mb-3">
        <label for="degree_level_id" class="form-label">Jenjang<i class="req-i">*</i></label>
        <select wire:model.lazy="degree_level_id" name="degree_level_id" id="degree_level_id"
            class="form-control @error('degree_level_id') is-invalid @enderror">
            <option value="">-- Pilih Jenjang --</option>
            @foreach ($degreeLevels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
            @endforeach
        </select>
        @error('degree_level_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Study Program --}}
    <div class="mb-3">
        <label for="study_program_id" class="form-label">Program Studi<i class="req-i">*</i></label>
        <select wire:model="study_program_id" name="study_program_id" id="study_program_id"
            class="form-control @error('study_program_id') is-invalid @enderror">
            <option value="">-- Pilih Program Studi --</option>
            @foreach ($studyPrograms as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
        @error('study_program_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit Registration</button>
</form>
