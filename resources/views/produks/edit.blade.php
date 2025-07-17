@extends('layouts.app')
@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <div class="container">
    <br>
    <h4 class="mb-3">Edit Produk</h4>

    <form action="{{ route('produks.update', $produks->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $produks->nama) }}" required>
            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Satuan</label>
            <input type="text" name="satuan" class="form-control" value="{{ old('satuan', $produks->satuan) }}" required>
            @error('satuan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Beli</label>
            <input type="text" name="harga_beli" class="form-control" value="{{ old('harga_beli', $produks->harga_beli) }}" required>
            @error('harga_beli') <small class="text-danger">{{ $message }}</small> @enderror
        </div>



        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('produks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
@endsection
