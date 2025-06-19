@extends('dashboard.layouts.dashboard-main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Daftar Kuliah</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">
                                <img class="my-auto" src="{{ asset('images/student-registration.jpeg') }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="company" class="form-control-label">Program</label>
                                    <input type="text" id="company" placeholder="Enter your company name"
                                        class="form-control" />
                                </div>
                                <div class="form-group"><label for="vat" class="form-control-label">VAT</label><input
                                        type="text" id="vat" placeholder="DE1234567890" class="form-control" />
                                </div>
                                <div class="form-group"><label for="street"
                                        class="form-control-label">Street</label><input type="text" id="street"
                                        placeholder="Enter street name" class="form-control" /></div>
                                <div class="row form-group">
                                    <div class="col-8">
                                        <div class="form-group"><label for="city"
                                                class="form-control-label">City</label><input type="text" id="city"
                                                placeholder="Enter your city" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group"><label for="postal-code" class="form-control-label">Postal
                                                Code</label><input type="text" id="postal-code" placeholder="Postal Code"
                                                class="form-control" /></div>
                                    </div>
                                </div>
                                <div class="form-group"><label for="country"
                                        class="form-control-label">Country</label><input type="text" id="country"
                                        placeholder="Country name" class="form-control" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
