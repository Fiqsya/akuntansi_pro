<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    public function index()
    {
        $masuks = Masuk::with(['produk', 'supplier'])->orderBy('tanggal', 'desc')->get();
        return view('masuks.index', compact('masuks'));
    }

    public function create()
    {
            $produks = Produk::orderBy('nama', 'asc')->get();
            $suppliers = Supplier::orderBy('nama', 'asc')->get();
            return view('masuks.create', compact('produks', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produks,id',
            'id_supplier' => 'required|exists:suppliers,id',
            'tanggal' => 'required',
            'jumlah' => 'required',
            
          
        ]);

        Masuk::create($request->all());
        return redirect()->route('masuks.index')->with('success', 'Data Barang masuk berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $masuks = Masuk::findOrFail($id);
        return view('masuks.show', compact('masuks'));
    }

    public function edit(string $id)
    {
        $masuks = Masuk::findOrFail($id);
        $produks = Produk::all();   
        $suppliers = Supplier::all();
        return view('masuks.edit', compact('masuks', 'produks', 'suppliers'));
    }

    public function update(Request $request, string $id)
    {
        $masuks = Masuk::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'id_produk' => 'required|exists:produks,id',
            'id_supplier' => 'required|exists:suppliers,id',
            'jumlah' => 'required|numeric|min:1',
        ]);
        
        $masuks->update([
            'tanggal' => $request->tanggal,
            'id_produk' => $request->id_produk,
            'id_supplier' => $request->id_supplier,
            'jumlah' => $request->jumlah,
        ]);
        
        return redirect()->route('masuks.index')->with('success', 'Data Barang Masuk berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $masuks = Masuk::findOrFail($id);
        $masuks->delete();

        return redirect()->route('masuks.index')->with('success', 'Data Barang masuk berhasil dihapus');
    }
}
