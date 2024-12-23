@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{asset('images/yayasan11.jpeg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span class="mr-2"><a href="blog.html">Event</a></span> <span>Detail Event</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Detail Program</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    <h2 class="mb-3">{{ $event->name }}</h2>
                    <div class="mb-5">
                        <span class="badge badge-danger me-2">pengeluaran: Rp.{{$event->cost}} </span>
                        <!-- <span class="badge badge-success me-2">pendapatan: Rp.{{ $event->donations->sum('amount') }} </span> -->
                        <span><span class="icon-calendar"></span> {{ $event->datetime }}</span>
                    </div>
                    <p>{{ $event->content }}</p>

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3>Event Lainnya</h3>
                        @foreach($events as $e)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{asset('storage/' . $e->photo)}});"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{ route('event-detail', $e->id) }}">{{ $e->name }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> {{ $e->datetime }}</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- <div class="sidebar-box ftco-animate">
                        <a href="{{ route('event-donation', $event->id) }}" class="btn btn-primary" style="width: 100%">Donasi</a>
                    </div> -->
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
