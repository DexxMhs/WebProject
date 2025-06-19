@if (!empty(session('success')))
    <div id="success-alert" class="sufee-alert alert with-close alert-success alert-dismissible fade show"
        style="position: fixed; top: 20px; right: 20px; z-index: 2000; opacity: 0.7; max-width: 300px;
       display: flex; align-items: center; transition: opacity 0.5s ease; animation: slideFadeIn 0.5s ease;">

        <!-- Ikon ceklis -->
        <div style="font-size: 24px; margin-right: 20px;">
            <i class="fa fa-check-circle"></i>
        </div>

        <!-- Pesan -->
        <div style="display: flex; flex-direction: column; gap: 3px;">
            <span class="badge badge-pill badge-success" style="width: fit-content;">Success</span>
            <span style="font-size: 13px;">{{ session('success') }}</span>
        </div>

        <!-- Tombol close -->
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left: auto;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (!empty($errors->any()))
    <div id="error-alert" class="sufee-alert alert with-close alert-danger alert-dismissible fade show"
        style="position: fixed; top: 20px; right: 20px; z-index: 2000; opacity: 0.7; max-width: 300px;
       display: flex; align-items: center; transition: opacity 0.5s ease; animation: slideFadeIn 0.5s ease;">

        <!-- Ikon ceklis -->
        <div style="font-size: 24px; margin-right: 20px;">
            <i class="fa fa-times-circle"></i>
        </div>

        <!-- Pesan -->
        <div style="display: flex; flex-direction: column; gap: 3px;">
            <span class="badge badge-pill badge-danger" style="width: fit-content;">Failed</span>
            <div>
                <ul style="padding-left: 16px; margin: 0; font-size: 13px; line-height: 1.4;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
