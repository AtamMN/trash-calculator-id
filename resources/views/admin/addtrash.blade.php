@extends('admin.main')

@section('add_trash')

@if(session('trash_msg'))
<div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
  {{session('trash_msg')}}
</div>
@endif

<form id="formTambah" method="POST" action="{{ route('admin.postaddtrash') }}" enctype="multipart/form-data">

  @csrf
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="name" required>
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="desc" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control price-input" id="harga" name="price">
  </div>
  <div class="mb-3">
    <label for="gambar" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="gambar" name="img" accept="image/*">
  </div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

@endsection