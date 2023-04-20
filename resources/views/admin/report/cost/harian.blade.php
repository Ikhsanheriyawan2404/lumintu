{{-- SetPaper A4 Potrait --}}

@extends('admin.report.layouts.app', ['title' => 'Laporan Harian Pengeluaran'])

@section('content')
    <table class="header mb-2">
        <thead class="text-center">
            <tr>
                <td colspan="2">
                    <h2>Laporan Harian Pengeluaran</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h2>CV. LUMINTU SIP</h2>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Penanggungjawab :</strong> Thoriqul Hafidz Prahanto</td>
                <td class="text-end"><strong>Tanggal :</strong> 13 Januari 2023</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped my-2">
        <thead>
            <tr>
                <th>NO.</th>
                <th>ITEM</th>
                <th>BIAYA</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $datas)
            <tr>
                <td class="text-center" width="20">{{ $loop->iteration }}</td>
                <td>{{ $datas->name }}</td>
                <td class="text-center">{{ $datas->total }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="">
        <p class="h6">Catatan:</p>
        <ul class="text-justify">
            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam nobis voluptatem vel
                numquam voluptas
                vero veritatis aut molestias laborum autem.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit dolorem culpa eos quos
                assumenda.
                Iste sed, non nam tempora beatae dolorem similique unde, doloribus mollitia eligendi sit
                quos
                architecto eveniet?</li>
        </ul>
    </div>
@endsection
