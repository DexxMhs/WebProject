<!-- ngambil dari extend layout dashboard -->
@extends('layouts.dashboard-main')

@section('container')
<!-- ngambil dari layouts dashboard -->
<form action="/proses" method="POST" class="form-container mt-4">
    @csrf

    <!-- SLIDE 1: Data Diri -->
    <div id="slide1" class="slide active">
        <h2 class="form-title mb-4"><i class="bi bi-person-circle"></i> DATA DIRI</h2>
        <div class="form-grid">
            <div class="form-group">
                <label for="nama-lengkap">Nama Lengkap</label>
                <input type="text" id="nama-lengkap" name="nama-lengkap" class="form-control" placeholder="Masukkan Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="tempat-lahir">Tempat Lahir</label>
                <input type="text" id="tempat-lahir" name="tempat-lahir" class="form-control" placeholder="Tempat Tanggal Lahir">
            </div>
            <div class="form-group">
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal-lahir" name="tanggal-lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" id="agama" class="form-control">
                    <option value="islam">Islam</option>
                    <option value="kristian">kristian</option>
                    <option value="budha">Budha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat-lengkap">Alamat Lengkap</label>
                <input type="text" id="alamat-lengkap" name="alamat-lengkap" class="form-control" placeholder="Masukkan Alamat Lengkap">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="handphone">No Handphone</label>
                <input type="number" id="handphone" name="handphone" class="form-control" placeholder="Masukkan No Handphone">
            </div>
        </div>
        <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextSlide(event)">Next <i class="bi bi-arrow-right-short"></i></button>
    </div>

    <!-- SLIDE 2: Pendidikan -->
    <div id="slide2" class="slide">
        <h2 class="form-title mb-4"><i class="bi bi-backpack"></i> PENDIDIKAN</h2>
        <div class="form-grid">
            <div class="form-group">
                <label for="lulusan">Tahun Lulus SMA</label>
                <input type="text" id="lulusan" name="lulusan" class="form-control" placeholder="Isi Tahun Lulusan">
            </div>
            <div class="form-group">
                <label for="asalsekolah">Asal Sekolah</label>
                <input type="text" id="asalsekolah" name="asalsekolah" class="form-control" placeholder="Isi Asal Sekolah">
            </div>
            <div class="form-group">
                <label for="alamat-sekolah">Alamat Sekolah</label>
                <input type="text" id="alamat-sekolah" name="alamat-sekolah" class="form-control" placeholder="Isi Alamat Sekolah">
            </div>     
        </div>
        <button class="btn btn-primary" type="button" onclick="prevSlide(event)"><i class="bi bi-arrow-left-short"></i>Back</button>
        <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextSlide(event)">Next <i class="bi bi-arrow-right-short"></i></button>
    </div>

    <!-- SLIDE 3: Data Ibu -->
    <div id="slide3" class="slide" style="display:none;">
        <h2 class="form-title mb-4"><i class="bi bi-person-standing-dress"></i> DATA ORANG TUA IBU</h2>
        <div class="form-grid">
            <div class="form-group">
                <label for="nama-ibu-kandung">Nama Ibu Kandung</label>
                <input type="text" id="nama-ibu-kandung" name="nama-ibu-kandung" class="form-control" placeholder="Isi Nama Ibu Kandung">
            </div>
            <div class="form-group">
                <label for="tanggal-lahir-ibu">Tanggal Lahir Ibu</label>
                <input type="date" id="tanggal-lahir-ibu" name="tanggal-lahir-ibu" class="form-control" placeholder="Isi Tanggal Lahir Ibu">
            </div>
            <div class="form-group">
                <label for="tempat-lahir-ibu">Tempat Lahir Ibu</label>
                <input type="text" id="tempat-lahir-ibu" name="tempat-lahir-ibu" class="form-control" placeholder="Isi Tempat Lahir Ibu">
            </div>
            <div class="form-group">
                <label for="status-ibu">Status Ibu Saat Ini</label>
                <select name="status-ibu" id="status-ibu" class="form-control">
                    <option value="ibu-rumah-tangga">Ibu Rumah Tangga</option>
                    <option value="wirausaha">Wirausaha</option>
                    <option value="pekerja-tetap">Bekerja</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="button" onclick="prevSlide(event)"><i class="bi bi-arrow-left-short"></i>Back</button>
        <button class="btn btn-primary" type="button"  id="nextBtn" onclick="nextSlide(event)">Next <i class="bi bi-arrow-right-short"></i></button>
    </div>

    <!-- SLIDE 4: Data Ayah -->
    <div id="slide4"  class="slide" style="display:none;">
        <h2 class="form-title mb-4"><i class="bi bi-person-standing"></i> DATA ORANG TUA AYAH</h2>
        <div class="form-grid">
            <div class="form-group">
                <label for="nama-ayah-kandung">Nama Ayah Kandung</label>
                <input type="text" id="nama-ayah-kandung" name="nama-ayah-kandung" class="form-control" placeholder="Isi Nama Ayah Kandung">
            </div>
            <div class="form-group">
                <label for="tanggal-lahir-ayah">Tanggal Lahir Ayah</label>
                <input type="date" id="tanggal-lahir-ayah" name="tanggal-lahir-ayah" class="form-control" placeholder="Isi Tanggal Lahir Ayah">
            </div>
            <div class="form-group">
                <label for="tempat-lahir-ayah">Tempat Lahir Ayah</label>
                <input type="text" id="tempat-lahir-ayah" name="tempat-lahir-ayah" class="form-control" placeholder="Isi Tempat Lahir Ayah">
            </div>
            <div class="form-group">
                <label for="status-ayah">Status Ayah Saat Ini</label>
                <select name="status-ayah" id="status-ayah" class="form-control">
                    <option value="wirausaha">Wirausaha</option>
                    <option value="pekerja-tetap">Bekerja</option>
                </select>
            </div>
            <button class="btn btn-primary" type="button" onclick="prevSlide(event)"><i class="bi bi-arrow-left-short"></i>Back</button>
            <button class="btn btn-success" id="submitBtn" type="submit" style="display:none;">Submit <i class="bi bi-send-arrow-up-fill"></i></button>
        </div>
    </div>
</form>

@endsection
