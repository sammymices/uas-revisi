@extends('dashboard.layout.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Halaman Data Anak</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Anak Panti</h5>
                            <h6 class="card-subtitle text-muted">Berisi data anak baru yang akan ditambahkan kedalam sistem.
                            </h6>
                        </div>
                        <div class="card-body">
                            <a type="button" href="{{ route('dashboard.child.create') }}"
                                class="btn btn-success rounded-5 mb-3">Tambah Data</a>

                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>BirthDate</th>
                                        <th>Gender</th>
                                        <th>Photo</th>
                                        <th></th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        //
                                    @endphp
                                    @foreach ($child as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->birthdate)->format('d M Y') }}</td>
                                            <td>{{ $data->gender }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $data->photo) }}" data-lightbox="image-1"
                                                    data-title="My caption"><img
                                                        src="{{ asset('storage/' . $data->photo) }}" class="img-fluid"
                                                        style="max-width: 90px"></a>
                                            </td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                <form action="{{ route('dashboard.child.destroy', $data->id) }}"
                                                    method="post">
                                                    <a class="btn btn-info"
                                                        href="{{ route('dashboard.child.edit', $data->id) }}"><i
                                                            class="align-middle" data-feather="edit-2"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="align-middle"
                                                            data-feather="trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('script')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })

        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endsection
