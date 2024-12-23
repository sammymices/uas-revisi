@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{ asset('images/yayasan13.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Donasi</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Halaman Donasi</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Terimakasih !</h2>
                    <p>Memberikan kebahagiaan untuk orang lain sejatinya juga membahagiakan diri-sendiri. Mari, bantu anak-anak yatim di panti asuhan agar senyum tergelincir di bibir mereka.</p>
                    <h1 class="h4">BSI 7733300072</h1> 
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <form action="{{ route('donasi.storeMoney') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Jumlah Donasi</label>
                            <input type="number" id="amount" name="amount" class="form-control" required>
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Pesan (Opsional)</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="photo">Upload Bukti Pembayaran</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
                            @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Donasi</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('app.midtrans_client_key') }}"></script>

    <script>
        $(document).ready(function() {
            $('#donate-form').submit(function(e) {
                e.preventDefault()

                var fd = new FormData(document.getElementById('donate-form'))

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: '{{ url ('donate-action') }}',
                    data: fd,
                    enctype: 'multipart/form-data',
                    dataType: 'JSON',
                    success: function(res) {
                        console.log(res)
                        window.snap.pay(res.token, {
                            onSuccess: function(result) {
                                Swal.fire(
                                    'Berhasil',
                                    'Terimakasih atas kebaikan anda !',
                                    'success'
                                )
                            },
                            onPending: function(result) {
                                Swal.fire(
                                    'Menunggu',
                                    'Silahkan melakukan pembayaran !',
                                    'info'
                                )
                            },
                            onError: function(result) {
                                Swal.fire(
                                    'Error',
                                    'Maaf, terjadi kesalahan !',
                                    'error'
                                )
                            },
                            onClose: function() {
                                // Optional: Handle the close event
                            }
                        });

                        $('input[name="amount"]').val("")
                        $('textarea[name="description"]').val("")
                    }
                })
            })
        })
    </script>
@endsection