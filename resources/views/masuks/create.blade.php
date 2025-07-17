@extends('layouts.app')
@section('title', 'Tambah Barang Masuk')

@section('content')
<div class="container">
    <div class="container">
    <br>
    <h4 class="mb-3">Tambah Barang Masuk</h4>

    <form action="{{ route('masuks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tanggal Barang Masuk</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
            @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <select name="id_produk" class="form-select" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($produks as $produk)
                <option value="{{ $produk->id }}" {{ old('id_produk') == $produk->id ? 'selected' : '' }}>
                    {{ $produk->nama }}
                </option>
                @endforeach
            </select>
            @error('produk_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <select name="id_supplier" class="form-select" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('id_supplier') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->nama}}
                </option>
                @endforeach
            </select>
            @error('id_supplier') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        
        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
            @error('jumlah') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        

     

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('masuks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
@endsection
