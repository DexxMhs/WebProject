<!-- ngambil dari extend layout dashboard -->
@extends('dashboard.layouts.dashboard-main')

@section('css')
    <style>
        .photo-profile {
            position: relative;
            width: 115px;
        }

        .profile-dp {
            position: relative;
            overflow: hidden;
            padding: 5px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background-color: #e0e0e0;
        }

        .overlay {
            position: absolute;
            top: 5px;
            left: 5px;
            width: calc(100px);
            height: calc(100px);
            border-radius: 50%;
            opacity: 0;
            z-index: 1;
            overflow: hidden;
            background: rgba(0, 0, 0, .4);
            transition: all .3s ease-in-out;
        }

        .overlay span {
            background: rgba(0, 0, 0, .5);
            color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, .4);
            padding: 0 0 5px;
        }

        .profile-dp:hover .overlay {
            opacity: 1;
        }

        .camera-icon {
            position: absolute;
            bottom: 5px;
            right: 0px;
            background-color: #fff;
            color: rgba(0, 0, 0, .5);
            border-radius: 50%;
            padding: 4px;
            font-size: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            z-index: 2;
        }

        .camera-icon i {
            font-size: 17px;
        }

        #imageInput {
            display: none;
        }

        .table td {
            vertical-align: middle;
        }

        .form-group {
            margin-bottom: 0px;
        }

        .form-group i {
            color: #dc3545;
        }
    </style>
@endsection

@section('container')
    <!-- ngambil dari layouts dashboard -->
    @livewire('stundent-profile')
@endsection

@section('scripts')
    <script>
        window.addEventListener('openModal', event => {
            const modalId = event.detail[0].id;
            const modalEl = document.getElementById(modalId);

            // Untuk Bootstrap 4, fallback kalau jQuery tidak ada:
            if (modalEl) {
                modalEl.classList.add('show');
                modalEl.style.display = 'block';
                modalEl.setAttribute('aria-modal', 'true');
                modalEl.removeAttribute('aria-hidden');

                // Tambahkan backdrop secara manual
                const backdrop = document.createElement('div');
                backdrop.className = 'modal-backdrop fade show';
                document.body.appendChild(backdrop);
            }
        });
    </script>

    <script>
        window.addEventListener('closeModal', function(event) {
            // Karena event.detail adalah array
            const modalId = event.detail[0]?.id;
            console.log("Tutup modal:", modalId);

            const modalEl = document.getElementById(modalId);
            if (!modalEl) return;

            modalEl.classList.remove('show');
            modalEl.style.display = 'none';
            modalEl.setAttribute('aria-hidden', 'true');
            modalEl.removeAttribute('aria-modal');
            modalEl.removeAttribute('role');

            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(backdrop => backdrop.remove());

            document.body.classList.remove('modal-open');
            document.body.style.paddingRight = '';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Saat tombol Cancel ditekan
            document.querySelector('#addSchoolData .btn.btn-secondary').addEventListener('click', function() {
                Livewire.dispatch('resetSchoolForm');
            });

            // Opsional: juga reset ketika modal ditutup manual (misalnya klik luar modal)
            $('#addSchoolData').on('hidden.bs.modal', function() {
                Livewire.dispatch('resetSchoolForm');
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/5f1e094195.js" crossorigin="anonymous"></script>
@endsection
