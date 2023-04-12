@extends('layouts.app', ['title' => 'Invoice'])

@section('main')
    <div class="card mb-3">
        <div class="d-flex flex-row-reverse">
            <div class="px-5 py-3">
                <button class="btn btn-secondary">Kembali</button>
                <button class="btn btn-primary"><i class="bi bi-printer me-3"></i>Print</button>
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/logo2.png') }}" class="img-fluid rounded-start p-2">
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-6 ps-3">
                            <div class="row mb-2">
                                <h6 class="card-title">Email</h6>
                                <p class="card-text">lumintu.laundry123@gmail.com</p>
                            </div>
                            <div class="row">
                                <h6 class="card-title">No Telepon</h6>
                                <p class="card-text">+6282110271556</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-2">
                                <h6 class="card-title">Alamat</h6>
                                <p class="card-text">Kampung Baru No. 1A RT.007 RW.003 Dangdang Cisauk Kab. Tangerang,
                                    Banten.
                                </p>
                            </div>
                            {{-- <div class="row">
                            <h6 class="card-title">Website</h6>
                            <p class="card-text">lumintusip.com</p>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="ps-4">
                <h3>INVOICE</h3>
            </div>
            <div class="pe-4 flex-grow-1">
                <hr>
            </div>
        </div>
        <div class="card-body px-4">
            <div class="row">
                <div class="col-6">
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <h6 class="card-title">Nomor Order</h6>
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">ORD-643542532432</p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <h6 class="card-title">Tanggal Order</h6>
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">12 Januari 2023</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="card-title">Tujuan</h6>
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">Hotel Alam Sari</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <h6 class="card-title">Alamat</h6>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">Kampung Baru No. 1A RT.007 RW.003 Dangdang Cisauk Kab. Tangerang, Banten.
                            </p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <h6 class="card-title">Penanggungjawab</h6>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">Thoriqul Hafidz Prahanto</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Nomor Telepon</h6>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">+6287839736104</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped my-4">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ITEM</th>
                            <th scope="col" class="text-center">HARGA</th>
                            <th scope="col" class="text-center">KUANTITI</th>
                            <th scope="col" class="text-center">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Apron</th>
                            <td class="text-center">4.000</td>
                            <td class="text-center">3</td>
                            <td class="text-center">12.000</td>
                        </tr>
                        <tr>
                            <th scope="row">Food & Beverage</th>
                            <td class="text-center">7.000</td>
                            <td class="text-center">5</td>
                            <td class="text-center">35.000</td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="3" class="text-center">TOTAL</th>
                            <th scope="row" class="text-center">47.000</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Penanggungjawab Valet</h6>
                        </div>
                        <div class="col-md-8">
                            Valet2
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Bukti Pembayaran</h6>
                        </div>
                        <div class="col-md-8">
                            <img src="{{ asset('assets/img/login.png') }}" class="img-fluid rounded-start p-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <h5 class="card-title">
                        INFO PEMBAYARAN
                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Transfer</h6>
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>817268126 (BCA)</li>
                                <li>817268126 (BRI)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="card-title">Contact Person</h6>
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>087839736104 (Thoriq)</li>
                                <li>087839736104 (Thoriq)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row justify-content-center">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid rounded-start p-2"
                            style="height: 100px; width: auto;">
                    </div>
                    <div class="row">
                        <h4 class="card-title text-center">CV. Lumintu SIP</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
