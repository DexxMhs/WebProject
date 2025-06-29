@extends('dashboardHomepage.layouts.main')

@section('body')

<style>
  .content-wrapper {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px 20px;
    background-color: #f3f4f6;
    text-align: justify;
  }

  .image-section {
    text-align: center;
    margin-bottom: 30px;
  }

  .image-section img {
    max-width: 400px;
    width: 100%;
    height: auto;
  }

  .text-section h1 {
    font-size: 26px;
    text-align: center;
    margin-bottom: 20px;
  }

  .text-section p {
    font-size: 16px;
    line-height: 1.8;
    white-space: pre-line;
  }

  @media (max-width: 768px) {
    .image-section img {
      max-width: 100%;
    }
  }
</style>

<div class="content-wrapper">
  <div class="image-section">
    <img src="image/mhw2.jpg" alt="Foto Rektor atau Logo Universitas">
  </div>

  <div class="text-section">
    <h1>Sambutan Rektor</h1>
    <p>
Assalamualaikum warahmatullahi wabarakatuh,  
Salam sejahtera bagi kita semua,  
Om swastiastu,  
Namo buddhaya,  
Salam kebajikan.

Yang saya hormati, para Wakil Rektor, Dekan, Dosen, dan seluruh Sivitas Akademika Universitas Bina Sarana Informatika,  
Serta yang saya banggakan, seluruh mahasiswa baru yang telah resmi menjadi bagian dari keluarga besar Universitas Bina Sarana Informatika.

Pertama-tama, marilah kita panjatkan puji dan syukur ke hadirat Tuhan Yang Maha Esa, karena atas rahmat dan karunia-Nya kita semua dapat berkumpul dalam suasana yang penuh semangat dan harapan baru.

Saya mengucapkan **selamat datang** kepada para mahasiswa baru di kampus tercinta ini. Selamat datang di sebuah lingkungan yang akan menjadi rumah kedua kalian dalam menuntut ilmu, mengembangkan potensi, dan meraih masa depan.

Universitas Bina Sarana Informatika bukan hanya tempat untuk belajar, tetapi juga tempat untuk tumbuh — secara intelektual, sosial, dan pribadi. Di sini, kalian akan dibimbing oleh para dosen yang kompeten, didukung oleh fasilitas yang terus dikembangkan, serta berada dalam komunitas akademik yang menjunjung tinggi nilai-nilai keilmuan, etika, dan integritas.

Perjalanan di dunia perguruan tinggi tentu tidak selalu mudah. Akan ada tantangan, tetapi juga banyak peluang. Kami percaya bahwa setiap dari kalian memiliki potensi luar biasa. Tugas kami adalah membantu kalian menemukannya, mengasahnya, dan menyiapkannya untuk memberi kontribusi nyata bagi masyarakat, bangsa, dan dunia.

Mari kita jalani proses ini dengan semangat, rasa ingin tahu yang tinggi, dan komitmen untuk menjadi insan pembelajar sepanjang hayat.

Akhir kata, sekali lagi saya ucapkan selamat bergabung di Universitas Bina Sarana Informatika. Selamat memulai langkah baru. Mari kita bersama-sama membangun masa depan yang lebih baik.

Wassalamu’alaikum warahmatullahi wabarakatuh,  
Salam sejahtera untuk kita semua.

Hormat saya,  
**Mr. Synister Gates**  
Rektor Universitas Bina Sarana Informatika
    </p>
  </div>
</div>

@endsection
