@extends('dashboardHomepage.layouts.main')

@section('body')

<style>
  .program-section {
    max-width: 1000px;
    margin: 0 auto;
    padding: 50px 20px;
    background-color: #f9fafb;
    font-family: Arial, sans-serif;
  }

  .program-section h1 {
    font-size: 32px;
    text-align: center;
    margin-bottom: 30px;
  }

  .program-section .program-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
  }

  .program-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    transition: 0.3s;
  }

  .program-card:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .program-card h3 {
    margin-bottom: 10px;
    color: #2c3e50;
  }

  .program-card p {
    font-size: 14px;
    color: #555;
  }
</style>

<div class="program-section">
  <h1>Program Studi Universitas Bina Sarana Informatika</h1>
  
  <div class="program-list">
    <div class="program-card">
      <h3>Sistem Informasi</h3>
      <p>Mempelajari integrasi antara teknologi informasi dan manajemen bisnis untuk menghasilkan solusi sistem yang efisien.</p>
    </div>

    <div class="program-card">
      <h3>Teknik Informatika</h3>
      <p>Fokus pada pengembangan perangkat lunak, algoritma, pemrograman, dan teknologi kecerdasan buatan.</p>
    </div>

    <div class="program-card">
      <h3>Manajemen Informatika</h3>
      <p>Gabungan antara keterampilan teknologi dan pengelolaan sistem informasi dalam organisasi.</p>
    </div>

    <div class="program-card">
      <h3>Ilmu Komunikasi</h3>
      <p>Mempelajari strategi komunikasi efektif dalam berbagai media, baik digital maupun konvensional.</p>
    </div>

    <div class="program-card">
      <h3>Akuntansi</h3>
      <p>Fokus pada pencatatan, analisis, dan pelaporan keuangan dalam bisnis dan organisasi.</p>
    </div>

    <div class="program-card">
      <h3>Perhotelan dan Pariwisata</h3>
      <p>Membekali mahasiswa dengan keterampilan operasional dan manajerial di bidang pariwisata dan hospitality.</p>
    </div>
  </div>
</div>

@endsection
