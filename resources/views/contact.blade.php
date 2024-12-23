@extends('layouts.app')

@section('content')
<div class="hero-wrap" style="background-image: url({{ asset('images/yayasan10.jpeg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <p class="breadcrumbs"><span><a href="/">Beranda</a></span> <span>Kontak</span></p>
                <h1 class="mb-3 bread">Kontak Kami</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row block-9">
            <div class="col-md-6 pr-md-5">
                <h4 class="mb-4">Apakah Anda memiliki pertanyaan atau pesan untuk Panti Asuhan?</h4>
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Anda" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Anda" name="email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" cols="30" rows="7" placeholder="Tulis pesan Anda" name="message" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <iframe style="border:0; width: 100%; height: 340px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.51221990168!2d106.6700883!3d-6.1805128!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8fde38f5ce9%3A0x3b6e24bf80f55e7c!2sPanti%20Asuhan%20Al%20Mubarok!5e0!3m2!1sid!2sid!4v1733667541097!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
