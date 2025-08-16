<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use App\Models\Trash;
use Illuminate\Http\Request;

class CashoutController extends Controller
{
    // Menambahkan item ke keranjang / cashout
    public function add(Request $request)
    {
        $request->validate([
            'trash_id' => 'required|exists:trashes,id',
            'qty' => 'required|numeric|min:0.01', // input berat/kg
        ]);

        // Ambil harga trash dari DB
        $trash = Trash::findOrFail($request->trash_id);

        $subtotal = $trash->price * $request->qty;

        // Simpan item ke tabel cashout
        Cashout::create([
            'trash_id' => $trash->id,
            'qty' => $request->qty,
            'subtotal' => $subtotal,
            // total bisa dihitung nanti ketika menampilkan keranjang
            'total' => $subtotal,
        ]);

        return back()->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }

    // Menampilkan modal / halaman cashout
    public function index()
    {
        $cartItems = Cashout::with('trash')->get();
        $itemCount = $cartItems->count();

        return view('cashout', compact('cartItems', 'itemCount'));
    }
}
