@extends('dashboardHomepage.layouts.main')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        ul {
            padding-left: 0px;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 40px;
            padding: 60px 20px;
            max-width: 1400px;
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

        .banner-prodi {
            position: relative;
            /* margin-top: 80px; */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 100%;
            height: 500px;
            background-image: url('/image/bg2.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .semester-title {
            background-color: #002F6C;
            color: #f3f4f6;
            text-align: center;
            font-weight: bold;
            padding: 10px;
        }

        table th,
        table td {
            vertical-align: middle;
        }

        .table-sks-total {
            background-color: #002F6C;
            color: #f3f4f6;
            font-weight: bold;
            text-align: right;
        }

        .diploma-card {
            background-color: #002F6C;
            opacity: 0.9;
            border-radius: 10px;
            width: 1200px;
            padding: 40px 30px;
            color: #f3f4f6;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .diploma-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .diploma-image img {
            max-width: 200px;
            border-radius: 8px;
        }

        .diploma-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 800px;
        }

        .diploma-text h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .diploma-text p {
            font-size: 16px;
            margin-bottom: 0px;
        }

        .diploma-button {
            background-color: #f3f4f6;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .diploma-button:hover {
            background-color: #005f38;
        }
    </style>
@endsection

@section('body')
    @include('dashboardHomepage.partials.navbar', ['faculties' => $faculties])


    <section class="banner-prodi">
        <div class="anu" style="margin-top: 80px; color: #f3f4f6;">
            <h1 style="font-size: 50px">Temukan Program Terbaik untuk Kamu</h1>
            <p style="font-weight: 300">Selamat datang di UBSI, tempat unggulan untuk menggali potensi terbaik
                Anda dengan program-program inovatif dan berbasis teknologi.</p>
        </div>
    </section>

    <div class="content-wrapper">
        @foreach ($degreeLevels as $degreeLevel)
            <div class="row">
                <div class="col-md-12">
                    <div class="diploma-card">
                        <div class="diploma-content">
                            <div class="diploma-image">
                                <img src="{{ $degreeLevel->image_url }}" alt="Program" />
                            </div>
                            <div class="diploma-text">
                                <h2>{{ strtoupper($degreeLevel->name) }}</h2>
                                <p>
                                    {{ $degreeLevel->description }} Program ini sekarang memiliki
                                    {{ $degreeLevel->studyPrograms->count() }} prodi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
@endsection
