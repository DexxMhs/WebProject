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
            color: white;
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
            color: white;
            font-weight: bold;
            text-align: right;
        }
    </style>
@endsection

@section('body')
    @include('dashboardHomepage.partials.navbar', ['faculties' => $faculties])


    <section class="banner-prodi">
        <div class="anu" style="margin-top: 80px; color: #f3f4f6;">
            <h1 style="font-size: 50px">({{ $studyProgram->code }}) {{ $studyProgram->name }}</h1>
            <h3 style="font-weight:500">{{ $studyProgram->faculty->name }} ({{ $studyProgram->faculty->code }})</h3>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="text-section">
            <h1>{{ $studyProgram->name }}</h1>
            <p>
                {{ $studyProgram->description }}
            </p>
        </div>

        <div class="image-section">
            <img src="{{ $studyProgram->imageUrl }}" alt="Foto Prodi">
        </div>
    </div>

    <div class="row content-wrapper">
        @foreach ($studyProgram->curriculums->groupBy('semester_id') as $semesterId => $curriculums)
            <div class="col-md-5 ">
                <div class="semester-title">
                    {{ $curriculums->first()->semester->name }}
                </div>
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Mata Kuliah</th>
                            <th class="text-center" style="width: 60px;">SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalSks = 0; @endphp
                        @foreach ($curriculums as $curriculum)
                            <tr>
                                <td>{{ $curriculum->course->name }}</td>
                                <td class="text-center">{{ $curriculum->course->credit }}</td>
                            </tr>
                            @php $totalSks += $curriculum->course->credit; @endphp
                        @endforeach
                        <tr class="table-sks-total">
                            <td>Total SKS</td>
                            <td class="text-center">{{ $totalSks }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
@endsection
