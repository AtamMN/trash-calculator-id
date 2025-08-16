<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trash;

class AdminController extends Controller
{
    public function addTrash()
    {
        return view('admin.addtrash');
    }

    public function postAddTrash(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'price' => 'required|numeric|min:0', // mencegah negatif
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $trash = new Trash();
        $trash->name = $request->name;
        $trash->desc = $request->desc;
        $trash->price = $request->price;

        // Upload gambar ke public/frontend/images
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('frontend/images'), $filename);
            $trash->img_path = 'frontend/images/' . $filename;
        }

        $trash->status = 'aktif'; // default status
        $trash->save();

        return redirect()->back()->with('trash_msg', 'Sampah berhasil ditambahkan!');
    }


    public function viewTrash(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $trashes = \App\Models\Trash::paginate($perPage);

        return view('admin.dashboard', compact('trashes', 'perPage'));
    }

    public function deleteTrash($id)
    {
        $trash = Trash::findOrFail($id);
        $trash->delete();
        return redirect()->back()->with('delete_msg', 'Sampah berhasil dihapus!');
    }

    public function updateTrash(Request $request, $id)
    {
        $trash = Trash::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'price' => 'required|numeric|min:0', // mencegah negatif
            'status' => 'required|in:aktif,nonaktif',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $trash->name = $request->name;
        $trash->desc = $request->desc;
        $trash->price = $request->price;
        $trash->status = $request->status;

        // Upload gambar baru jika ada
        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('frontend/images'), $filename);
            $trash->img_path = 'frontend/images/' . $filename;
        }

        $trash->save();

        return redirect()->back()->with('success_msg', 'Data sampah berhasil diperbarui!');
    }
}
