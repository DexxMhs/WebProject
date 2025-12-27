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
            max-width: 500px;
            /* Ukuran gambar diperbesar */
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

    <div class="content-wrapper" style="margin-top: 80px">
        <div class="text-section">
            <h1>Ekonomi Bisnis (S1)</h1>
            <p>
                Dalam dunia yang semakin kompetitif, pemahaman tentang ekonomi bisnis menjadi kunci utama bagi pelaku usaha,
                pengambil kebijakan, maupun mahasiswa ekonomi dan manajemen. Ekonomi bisnis adalah cabang ilmu ekonomi yang
                mempelajari bagaimana perusahaan membuat keputusan strategis dalam mengelola sumber daya yang terbatas demi
                mencapai tujuan bisnis yang optimal.
                Dengan menggabungkan prinsip ekonomi mikro dan makro, ekonomi bisnis membantu menjawab pertanyaan penting
                seperti:
            </p>

            <h2>Mengapa Perlu Memahami Ekonomi Bisnis?</h2>
            <ol>
                <li>Pengambilan Keputusan Lebih Tepat
                    Data dan teori ekonomi membantu pelaku bisnis menghindari keputusan berdasarkan asumsi atau insting
                    semata.</li>
                <li>Menghadapi Perubahan Pasar
                    Dengan memahami tren ekonomi, bisnis bisa lebih adaptif dalam menghadapi krisis, inflasi, atau perubahan
                    regulasi.</li>
                <li>Meningkatkan Daya Saing
                    Strategi berbasis analisis ekonomi mampu memberi nilai tambah yang kompetitif di pasar.</li>
            </ol>
        </div>

        <div class="image-section">
            <img src="image/ekonomi.png" alt="Logo TI">
        </div>
    </div>
@endsection
