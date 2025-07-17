@extends('layouts.app')

@section('title', 'Daftar Supplier')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container">
    <br>
    <h4>Daftar Supplier</h4>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    <table class="table table-bordered table-sm" id="tabel-akun">
        <thead class="table-light">
            <tr>
                <th style="text-align: center">No</th>
                <th>Nama Supplier</th>
                <th>Jenis</th>
                <th>Normal</th>
                <th  class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $a)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->alamat }}</td>
                <td>{{ $a->handphone }}</td>
                <td class="text-center">
                    <a href="{{ route('suppliers.edit', $a->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('suppliers.destroy', $a->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
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
