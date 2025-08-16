@extends('admin.main')

@section('dashboard')
<div class="container mt-4">
  <div class="flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Daftar Sampah</h2>
    @if(session('delete_msg'))
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
      {{session('delete_msg')}}
    </div>
    @endif

    <!-- Scrollable Table -->
    <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
      <table class="table table-bordered table-striped mb-0">
        <thead class="thead-dark" style="position: sticky; top: 0; z-index: 1;">
          <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trashes as $trash)
          <tr>
            <td>{{ $trash->name }}</td>
            <td>{{ $trash->desc }}</td>
            <td>Rp {{ number_format($trash->price, 0, ',', '.') }}</td>
            <td>
              <img src="{{ asset($trash->img_path ? $trash->img_path : 'frontend/images/p1.png') }}"
                width="80" class="img-thumbnail">
            </td>
            <td>{{$trash->status}}</td>
            <td>
              <!-- Tombol Edit -->
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $trash->id }}">
                Edit
              </button>
              <div class="modal fade" id="editModal{{ $trash->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $trash->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="{{ route('admin.updatetrash', $trash->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $trash->id }}">Edit Sampah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="name{{ $trash->id }}" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name{{ $trash->id }}" name="name" value="{{ $trash->name }}" required>
                        </div>

                        <div class="mb-3">
                          <label for="desc{{ $trash->id }}" class="form-label">Deskripsi</label>
                          <textarea class="form-control" id="desc{{ $trash->id }}" name="desc" rows="3" required>{{ $trash->desc }}</textarea>
                        </div>

                        <div class="mb-3">
                          <label for="price{{ $trash->id }}" class="form-label">Harga</label>
                          <input type="number" class="form-control price-input" id="price{{ $trash->id }}" name="price" value="{{ $trash->price }}" min="0" step="0.01" required>
                        </div>

                        <div class="mb-3">
                          <label for="status{{ $trash->id }}" class="form-label">Status</label>
                          <select class="form-select" id="status{{ $trash->id }}" name="status">
                            <option value="aktif" {{ $trash->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ $trash->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="img{{ $trash->id }}" class="form-label">Ganti Gambar</label>
                          <input type="file" class="form-control" id="img{{ $trash->id }}" name="img_path">
                          <small class="text-muted">Kosongkan jika tidak ingin ganti gambar</small>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <a href="{{ route('admin.deletetrash', $trash->id) }}"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Apakah Anda yakin ingin menghapus sampah {{ $trash->name }}?')">
                Hapus
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
      {{ $trashes->appends(['per_page' => $perPage])->links() }}
    </div>
  </div>


  @endsection
