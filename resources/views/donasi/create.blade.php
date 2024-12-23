@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{ asset('images/yayasan13.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Donasi</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Form Donasi</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea name="pesan" id="pesan" class="form-control" rows="4" placeholder="Pesan untuk Yayasan" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_donasi">Jumlah Donasi</label>
                            <input type="number" name="jumlah_donasi" id="jumlah_donasi" class="form-control" placeholder="Jumlah Donasi" required>
                        </div>

                        <div class="form-group">
                            <label for="bukti_transfer">Bukti Transfer</label>
                            <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control-file" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Kirim Donasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

