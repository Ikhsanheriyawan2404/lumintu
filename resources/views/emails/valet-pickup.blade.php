@extends('admin.emails.layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-6 col-sm-4">
                <img src="{{ asset('assets/img/logo2.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-6 col-sm-8">
                <h4 class="text-end fw-bold">Pemberitahuan Penjemputan</h4>
            </div>
        </div>
        <div class="card shadow-lg mt-3 p-3">
            <div class="fs-5">
                <p class="fw-bold">Hai Valet,</p>
                <p style="text-align: justify">Pesanan dengan nomor pesanan <i>98173987</i> telah masuk kedalam tahap
                    <strong>penjemputan</strong>,
                    silahkan untuk dijemput ke <i>Hotel Indah</i> alamat lengkap hotel (nomer hp).
                    Untuk informasi selengkapnya klik tombol yang ada dibawah ini.
                </p>
                <div class="text-center">
                    <a href="#" class="btn btn-secondary my-3 col-6">Lihat Selengkapnya</a>
                </div>
                <p class="mt-3">Salam Hangat,</p>
                <p class="fw-bold">CV. Lumintu SIP</p>
            </div>
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
