@extends('dashboard.layout.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Halaman Donasi</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">List Donasi</h5>
                                    <h6 class="card-subtitle text-muted">List donasi yang telah diterima di panti asuhan.</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a target="_blank" href="{{ route('dashboard.printMoneyDonation') }}" class="btn btn-danger">Cetak PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Bukti Transfer</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donations as $donation)
                                    <tr>
                                        <td>{{ $donation->user->name }}</td>
                                        <td>
                                            <img width="75" height="75"
                                            src="{{ asset('storage/' . $donation->photo) }}" alt="">
                                        </td>                                        <td>{{ $donation->description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($donation->date)->format('d M Y') }}</td>
                                        <td>Rp.{{ number_format($donation->amount) }}</td>
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
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endsection
