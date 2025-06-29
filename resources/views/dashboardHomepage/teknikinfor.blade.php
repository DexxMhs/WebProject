@extends('dashboardHomepage.layouts.main')

@section('body')
<style>
  .content-wrapper {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    gap: 40px;
    padding: 60px 20px;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #f3f4f6;
  }

  .text-section {
    flex: 1;
  }

  .text-section h1 {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .text-section p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 30px;
  }

  .text-section h2 {
    font-size: 20px;
    margin-bottom: 15px;
  }

  .text-section ol {
    padding-left: 20px;
    font-size: 16px;
    line-height: 1.6;
  }

  .text-section ol li {
    margin-bottom: 10px;
  }

  .image-section img {
    max-width: 500px; /* Ukuran gambar diperbesar */
    height: auto;
  }

  @media (max-width: 768px) {
    .content-wrapper {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .text-section {
      text-align: left;
    }

    .image-section img {
      max-width: 100%;
    }
  }
</style>

<div class="content-wrapper">
  <div class="text-section">
    <h1>VISI KEILMUAN PROGRAM STUDI TEKNOLOGI INFORMASI (S1)</h1>
    <p>
      Menjadi Program Studi yang unggul dalam menghasilkan lulusan yang mampu membangun Infrasturktur Teknologi Informasi berbasis Artificial Intelligent khususnya dalam bidang Keilmuan System Administrator, Cyber Security serta Object Programmer.
    </p>

    <h2>TUJUAN</h2>
    <ol>
      <li>Menghasilkan lulusan yang memiliki kemampuan dalam mengimplementasikan ilmu pengetahuan dan teknologi informasi yang mendukung ekonomi kreatif.</li>
      <li>Menghasilkan lulusan yang berkompeten, kreatif, inovatif, kompetitif dan berakhlak mulia.</li>
      <li>Menghasilkan penelitian dan karya Ilmiah di bidang teknologi informasi yang diakui pada tingkat nasional dan internasional.</li>
      <li>Terwujudnya kegiatan pengabdian dan pemberdayaan masyarakat di bidang teknologi informasi yang mendorong pengembangan potensi sumber daya manusia untuk mewujudkan kesejahteraan Masyarakat.</li>
      <li>Menghasilkan suasana akademik yang mendukung bakat, minat, dan kreativitas dalam rangka menunjang pengembangan ekonomi kreatif.</li>
      <li>Menghasilkan tata kelola yang baik di Program Studi teknologi informasi.</li>
    </ol>
  </div>

  <div class="image-section">
    <img src="image/teknikinfor.jpg" alt="Logo TI">
  </div>
</div>
@endsection