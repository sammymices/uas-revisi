@extends('dashboard.layout.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Form Tambah Gallery</h5>
                            <h6 class="card-subtitle text-muted">Anda dapat menambah gallery di form ini </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.child.update', $child->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $child->id }}">
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name" value="{{ $child->name }}"
                                            class="form-control" placeholder="Nama">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Birth Date</label>
                                        <input class="form-control" type="date" value="{{ $child->birthdate }}"
                                            name="birthdate" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="photo">Foto</label>
                                    <br>
                                    <img src="{{ asset('storage/' . $child->photo) }}" name="photo"
                                        style="max-width: 200px" alt="Current Photo">
                                    <br>
                                    <br>
                                    <input type="hidden" name="photo" value="{{ $child->photo }}">
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                    <small>Format yang diterima: jpeg, png, jpg, gif. Ukuran maksimum file: 2MB</small>
                                </div>

                                <div class="col-12 col-xl-4 mt-3">
                                    <label class="form-label">Pilih Jenis Kelamin Anda</label>
                                    <div class="form-inline">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadio1"
                                                value="Laki-laki" {{ $child->gender == 'laki-laki' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleRadio1">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadio2"
                                                value="Perempuan" {{ $child->gender == 'perempuan' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="exampleRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3"></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
