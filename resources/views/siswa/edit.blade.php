@extends('layouts.app')
@section('title', 'Edit Siswa')

@section('content')
<div class="container">
    <div class="container">
    <br>
    <h4 class="mb-3">Edit Siswa</h4>

    <form action="{{ route('siswas.update', $siswas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode Siswa</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswas->nis) }}" required>
            @error('code') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa', $siswas->nama_siswa) }}" required>
            @error('nama_siswa') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $siswas->alamat) }}" required>
            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

       

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
@endsection
