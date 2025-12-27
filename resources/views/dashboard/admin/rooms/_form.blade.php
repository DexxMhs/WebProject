<div class="mb-3">
    <label for="code" class="form-label">Kode Ruang Kelas<i class="req-i">*</i></label>
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $room->code ?? '') }}">
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Nama Ruang Kelas<i class="req-i">*</i></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $room->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="building_id" class="form-label">Lokasi Gedung Kampus<i class="req-i">*</i></label>
    <select name="building_id" class="form-control @error('building_id') is-invalid @enderror">
        <option value="">-- Select Building --</option>
        @foreach ($buildings as $building)
            <option value="{{ $building->id }}"
                {{ old('building_id', $room->building_id ?? '') == $building->id ? 'selected' : '' }}>
                {{ $building->name }}
            </option>
        @endforeach
    </select>
    @error('building_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label">Tipe<i class="req-i">*</i></label>
    <select name="type" class="form-control @error('type') is-invalid @enderror">
        <option value="">-- Select Type --</option>
        @foreach (['classroom', 'lab', 'hall', 'office'] as $type)
            <option value="{{ $type }}" {{ old('type', $room->type ?? '') == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
        @endforeach
    </select>
    @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="capacity" class="form-label">Kapasitas</label>
    <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror"
        value="{{ old('capacity', $room->capacity ?? '') }}">
    @error('capacity')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $room->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
