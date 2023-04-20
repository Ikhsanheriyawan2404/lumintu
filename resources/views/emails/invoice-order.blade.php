@extends('admin.emails.layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-6 col-sm-4">
                <img src="{{ asset('assets/img/logo2.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-6 col-sm-8">
                <h4 class="text-end fw-bold">Pemberitahuan Pesanan</h4>
            </div>
        </div>
        <div class="card shadow-lg mt-3 p-3">
            <div class="fs-5">
                <p class="fw-bold">Hai Hotel Indah,</p>
                <p style="text-align: justify">Pesanan anda dengan nomor pesanan <i>98173987</i> telah masuk kedalam tahap
                    <strong>penjemputan</strong>
                    ke tempat anda oleh <i>Valet</i>.

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Invoice</h5>
                          
                            <p class="card-text">
                            Nomer Pesanan: 98173987 <br>
                            Tanggal : <br>
                            Costumer : Hotel Indah <br>
                            Valet : valet
                            </p>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kuantiti</th>
                                    <th scope="col">Subtotal</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Apron</td>
                                    <td>4000</td>
                                    <td>8</td>
                                    <td>32000</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Bath Math (BM)</td>
                                    <td>1800</td>
                                    <td>10</td>
                                    <td>18000</td>
                                  </tr>
                                </tbody>
                              </table>
                              <h4>Total : </h4>
                        </div>
                      </div>
                    Untuk informasi selengkapnya klik tombol yang ada dibawah ini.
                </p>
                <div class="text-center">
                    <a href="#" class="btn btn-secondary my-3 col-6">Lihat Selengkapnya</a>
                </div>
                <p class="mt-3">Salam Hangat,</p>
                <p class="fw-bold">CV. Lumintu SIP</p>
            </div>
            <p class="fs-6 my-3">*Faktur untuk nomor pesanan <i>98173987</i> terlampir dalam email ini.</p>
        </div>
        <div class="d-grip mt-4 gap-5 text-center">
            <a href="#" class="btn btn-outline-dark rounded-circle"><i class="bi bi-whatsapp"></i></a>
            <a href="#" class="btn btn-outline-dark rounded-circle"><i class="bi bi-envelope"></i></a>
        </div>
        <p class="text-center mt-2"><i class="bi bi-c-circle"></i> 2023. All Right Reserved.</p>
    </div>
@endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'PT-Serif', 'serif';
            background-color: #D5d8d8;
        }
    </style>
@endpush
