@extends('layouts.app')

@section('title', 'Daftar Barang Masuk')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container">
    <br>
    <h4>Daftar Produk</h4>
    <a href="{{ route('masuks.create') }}" class="btn btn-primary mb-3">Tambah Barang Masuk</a>

    <table class="table table-bordered table-sm" id="tabel-akun">
        <thead class="table-light">
            <tr>
                <th style="text-align: center">No</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Nama Supplier</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Total</th>
                <th  class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masuks as $a)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->produk->nama ?? '-' }}</td>
                <td>{{ $a->supplier->nama ?? '-' }}</td>
                <td>{{ $a->jumlah }}</td>
                <td>{{ $a->produk->satuan ?? '-' }}</td>
                <td>{{ $a->produk->harga_beli ? 'Rp. ' . number_format($a->produk->harga_beli, 0, ',', '.') : '-' }}</td>
                <td>Rp. {{ number_format($a->jumlah * ($a->produk->harga_beli ?? 0), 0, ',', '.') }}</td>
                <td class="text-center">
                    <a href="{{ route('masuks.edit', $a->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('masuks.destroy', $a->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabel-akun').DataTable({
            columnDefs: [
                { orderable: false, targets: 4 } // Non-sortable for Aksi column
            ]
        });
    });
</script>
@endpush
