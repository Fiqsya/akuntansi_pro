<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nis')->get();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa',
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'handphone' => 'required',
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswas.index')->with('success', 'Akun berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $account = Siswa::findOrFail($id);
        return view('siswas.show', compact('account'));
    }

    public function edit(string $id)
    {
        $siswas = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswas'));
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'alamat' => 'required',
        ]);

        $siswa->update($request->all());
        return redirect()->route('siswas.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswas.index')->with('success', 'Data berhasil dihapus');
    }
}
