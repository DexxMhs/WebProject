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
            <h1>Misi</h1>
            <p>
                Menjadi universitas unggul di bidang ekonomi kreatif pada tahun 2033 .
            </p>
        </div>
    </div>
@endsection
