@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{asset('images/yayasan11.jpeg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Program</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Program</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($events as $message)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a class="block-20" style="background-image: url('{{asset('storage/'.$message->photo)}}');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Created by Admin</a></div>
                            </div>
                            <h3 class="heading mb-4"><a href="#">{{ $message->name  }}</a></h3>
                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> {{ $message->datetime  }}</span> <span><i class="icon-map-o"></i> {{ $message->location  }}</span></p>
                            <p>{{$message->description}}</p>
{{--                            <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>--}}
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <a href="{{ route('event-donation', $message->id) }}" class="btn btn-primary" style="width: 100%">Donasi</a>
                                </div> -->
                                <div class="col-md-6">
                                    <a href="{{ route('event-detail', $message->id) }}" class="btn btn-default" style="width: 100%">Detail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
