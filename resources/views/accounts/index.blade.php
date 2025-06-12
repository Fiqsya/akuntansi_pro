@extends('layouts.app')

@section('title', 'Daftar Akun')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container">
    <br>
    <h4>Daftar Akun</h4>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">Tambah Akun</a>

    <table class="table table-bordered table-sm" id="tabel-akun">
        <thead class="table-light">
            <tr>
                <th style="text-align: center">Kode</th>
                <th>Nama Akun</th>
                <th>Jenis</th>
                <th>Normal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accounts as $a)
            <tr>
                <td style="text-align: center">{{ $a->code }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->type }}</td>
                <td>{{ $a->normal_balance }}</td>
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
        $('#tabel-akun').DataTable();
    });
</script>
@endpush
