<div class="row">
  @foreach($trashes as $trash)
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="box">
      <a href="#" data-bs-toggle="modal" data-bs-target="#trashModal{{ $trash->id }}">
        <div class="img-box">
          <img src="{{ $trash->img_path }}" alt="">
        </div>
        <div class="detail-box">
          <h6>{{ $trash->name }}</h6>
          <h6>
            Rp <span>{{ number_format($trash->price, 0, ',', '.') }}</span> /kg
          </h6>
        </div>
        <div class="new">
          <span>HIGH</span>
        </div>
      </a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="trashModal{{ $trash->id }}" tabindex="-1" aria-labelledby="trashModalLabel{{ $trash->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="trashModalLabel{{ $trash->id }}">{{ $trash->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5">
              <img src="{{ $trash->img_path }}" class="img-fluid rounded" alt="{{ $trash->name }}">
            </div>
            <div class="col-md-7">
              <p><strong>Deskripsi:</strong></p>
              <p>{{ $trash->desc }}</p>
              <p><strong>Harga:</strong> Rp {{ number_format($trash->price, 0, ',', '.') }} /kg</p>

              <div class="mb-3">
                <label for="kgInput{{ $trash->id }}" class="form-label">Masukkan Berat (kg)</label>
                <input type="number" step="0.01" min="0.1" class="form-control kg-input" id="kgInput{{ $trash->id }}" placeholder="contoh: 2.5">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success add-to-cart" data-id="{{ $trash->id }}" data-name="{{ $trash->name }}" data-price="{{ $trash->price }}">
            Masukkan Keranjang
          </button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addButtons = document.querySelectorAll('.add-to-cart');
    const cartCountEl = document.getElementById('cartCount');
    const cartTableBody = document.querySelector('#cartTable tbody');
    const cartTotalEl = document.getElementById('cartTotal');

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function updateCartUI() {
        cartCountEl.textContent = cart.length;

        cartTableBody.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const subtotal = item.price * item.qty;
            total += subtotal;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>${item.qty}</td>
                <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                <td>Rp ${subtotal.toLocaleString('id-ID')}</td>
                <td><button class="btn btn-danger btn-sm remove-item" data-index="${index}">Hapus</button></td>
            `;
            cartTableBody.appendChild(row);
        });

        cartTotalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');

        // Tambah event listener untuk tombol hapus
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', function() {
                const idx = this.dataset.index;
                cart.splice(idx, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
            });
        });
    }

    addButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const trashId = this.dataset.id;
            const name = this.dataset.name;
            const price = parseFloat(this.dataset.price);

            const qtyInput = document.getElementById('kgInput' + trashId);
            let qty = parseFloat(qtyInput.value);
            if(isNaN(qty) || qty <= 0) {
                alert('Masukkan kuantitas yang valid!');
                return;
            }

            // Tambahkan ke cart
            cart.push({trashId, name, price, qty});
            localStorage.setItem('cart', JSON.stringify(cart));

            updateCartUI();
            qtyInput.value = '';
            bootstrap.Modal.getInstance(document.getElementById('trashModal' + trashId)).hide();
        });
    });

    // Inisialisasi UI saat load
    updateCartUI();
});
</script>
