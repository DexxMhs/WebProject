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

        .campus-card {
            width: 320px;
            height: 520px;
            border: 1px solid #eee;
            border-top: 4px solid #002F6C;
            /* garis merah di atas */
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', sans-serif;
        }

        .campus-image {
            width: 100%;
            display: block;
        }

        .campus-body {
            padding: 16px;
        }

        .campus-title {
            color: #002F6C;
            /* merah Telkom */
            font-size: 20px;
            margin-bottom: 10px;
        }

        .campus-address {
            font-size: 14px;
            color: #333;
            line-height: 1.5;
        }
    </style>
@endsection

@section('body')
    @include('dashboardHomepage.partials.navbar', ['faculties' => $faculties])


    <section class="banner-prodi">
        <div class="anu" style="margin-top: 80px; color: #f3f4f6;">
            <h1 style="font-size: 50px">Lokasi-lokasi Kampus BSI</h1>
        </div>
    </section>

    <div class="content-wrapper row">
        @foreach ($buildings as $building)
            <div class="col-md-4 campus-card">
                <img src="{{ $building->image_url }}" alt="Kampus" class="campus-image" />
                <div class="campus-body">
                    <h3 class="campus-title">{{ $building->name }}</h3>
                    <p class="campus-address">
                        {{ $building->address }}
                    </p>
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
