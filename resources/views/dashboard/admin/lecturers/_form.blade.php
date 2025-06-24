@php
    $faculties = $faculties ?? \App\Models\Faculty::all();
@endphp

<div class="mb-3">
    <label>NIDN<i class="req-i">*</i></label>
    <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror"
        value="{{ old('nidn', $lecturer->nidn ?? '') }}">
    @error('nidn')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Nama Dosen<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $lecturer->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Jenis Kelamin<i class="req-i">*</i></label>
    <select name="gender" class="form-control @error('faculty_id') is-invalid @enderror">
        <option value="">-- Select Gender --</option>
        <option value="male" {{ old('gender', $lecturer->gender ?? '') == 'male' ? 'selected' : '' }}>Male
        </option>
        <option value="female" {{ old('gender', $lecturer->gender ?? '') == 'female' ? 'selected' : '' }}>
            Female
        </option>
    </select>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $lecturer->email ?? '') }}">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>No. Telepon</label>
    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone', $lecturer->phone ?? '') }}">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $lecturer->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Fakultas</label>
    <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror">
        <option value="">-- Select Faculty --</option>
        @foreach ($faculties as $faculty)
            <option value="{{ $faculty->id }}"
                {{ old('faculty_id', $lecturer->faculty_id ?? '') == $faculty->id ? 'selected' : '' }}>
                {{ $faculty->name }}
            </option>
        @endforeach
    </select>
    @error('faculty_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="photo" class="form-control-file">
    @if (!empty($lecturer->photo))
        <img src="{{ asset('storage/' . $lecturer->photo) }}" width="100" class="mt-2">
    @endif
    @error('photo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
