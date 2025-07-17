@extends('layouts.app')
@section('title', 'Tambah Supplier')

@section('content')
<div class="container">
    <div class="container">
    <br>
    <h4 class="mb-3">Tambah Supplier</h4>

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Hanphone</label>
            <input type="text" name="handphone" class="form-control" value="{{ old('handphone') }}" required>
            @error('handphone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

     

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
@endsection
