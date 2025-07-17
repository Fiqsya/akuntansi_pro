<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('nama')->get();
        return view('produks.index', compact('produks'));
    }

    public function create()
    {
        return view('produks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required',
          
        ]);

        Produk::create($request->all());
        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $produks = Produk::findOrFail($id);
        return view('produks.show', compact('produks'));
    }

    public function edit(string $id)
    {
        $produks = Produk::findOrFail($id);
        return view('produks.edit', compact('produks'));
    }

    public function update(Request $request, string $id)
    {
        $produks = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required|unique:produks,nama,' . $produks->id,
            'satuan' => 'required',
            'harga_beli' => 'required',
            
        ]);

        $produks->update($request->all());
        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $produks = Produk::findOrFail($id);
        $produks->delete();

        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus');
    }
}
