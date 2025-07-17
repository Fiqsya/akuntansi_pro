@extends('layouts.app')
@section('title', 'Tambah Siswa')

@section('content')
<div class="container">
    <div class="container">
    <br>
    <h4 class="mb-3">Tambah Siswa</h4>

    <form action="{{ route('siswas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" required>
            @error('nis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}" required>
            @error('nama_siswa') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Handphone</label>
            <input type="text" name="handphone" class="form-control" value="{{ old('handphone') }}" required>
            @error('handphone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

  

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
@endsection
