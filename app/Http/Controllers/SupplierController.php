<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('nama')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'handphone' => 'required',
          
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Akun berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $account = Supplier::findOrFail($id);
        return view('suppliers.show', compact('account'));
    }

    public function edit(string $id)
    {
        $account = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('account'));
    }

    public function update(Request $request, string $id)
    {
        $account = Supplier::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:suppliers,code,' . $account->id,
            'name' => 'required',
            'type' => 'required',
            'normal_balance' => 'required'
        ]);

        $account->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Akun berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $account = Supplier::findOrFail($id);
        $account->delete();

        return redirect()->route('suppliers.index')->with('success', 'Akun berhasil dihapus');
    }
}
