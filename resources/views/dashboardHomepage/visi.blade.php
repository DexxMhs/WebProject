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

    @include('dashboardHomepage.partials.navbar', ['faculties' => $faculties])

    <div class="content-wrapper">


        <div class="text-section">
            <h1>Visi</h1>
            <p>
            <ul>
                <li>Menyelenggarakan program pendidikan akademik dan vokasi yang mendukung ekonomi kreatif.</li>
                <li>Menyelenggarakan penelitian berkualitas.</li>
                <li>Menyelenggarakan pengabdian masyarakat untuk meningkatkan kualitas SDM.</li>
                <li>Mengelola universitas secara mandiri dengan tata kelola unggul, berorientasi mutu.</li>
                <li>Memperluas jejaring kerja sama dengan pemerintah, industri, dan pelaku usaha – baik dalam negeri maupun
                    luar negeri.</li>
            </ul>
            </p>
        </div>
    </div>
@endsection
