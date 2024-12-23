@extends('dashboard.layout.app')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">

                <h1 class="h3 mb-3">Halaman Event</h1>
                </div>
                <div class="col-6 text-end"><a class="btn btn-primary" href="{{ route('dashboard.events.create') }}">Tambah Event</a></div>
            </div>

            <div class="row">
                @foreach($events as $event)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" style="height: 200px" src="{{ asset('storage/'. $event->photo) }}" alt="Unsplash">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ $event->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <span class="badge badge-soft-danger me-2">pengeluaran: Rp.{{$event->cost}} </span>
                                    <span class="badge badge-soft-success me-2">pendapatan: Rp.{{ $event->donations->sum('amount') }} </span>
                                </div>
                                <p class="card-text">{{ $event->description }}</p>
                                <a href="{{ route('dashboard.events.edit', $event->id) }}" class="card-link">Edit</a>
                                <a href="#" data-id="{{ $event->id }}" class="card-link delete">Hapus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

    <x-delete-modal></x-delete-modal>
@endsection
@section('script')
    <script>
        // delete modal
        $(document).on('click', '.delete', function () {
            $('#exampleModal').modal('show')
            const id = $(this).attr('data-id');
            let url = `{{ route('dashboard.events.destroy', ':id') }}`.replace(':id', id);
            $('#deleteForm').attr('action', url);
        });
    </script>
@endsection
