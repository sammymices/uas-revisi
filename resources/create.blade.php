@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{ asset('images/yayasan13.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <span class="mr-2"><a href="/">Beranda</a></span>
                        <span>Donasi</span>
                    </p>
                    <h1 class="mb-3 bread">Form Donasi</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <form action="{{ route('donasi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah Donasi:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>

            <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea class="form-control" id="pesan" name="pesan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Donasi</button>
        </form>
    </div>
@endsection
