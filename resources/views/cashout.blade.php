<!-- Tombol Cashout dengan Badge -->
<button type="button" class="btn btn-primary btn-lg position-fixed" 
        style="bottom: 20px; right: 20px; z-index: 1000;"
        data-bs-toggle="modal" data-bs-target="#cashoutModal">
    Cashout <span class="badge bg-danger ms-2" id="cartCount">0</span>
</button>

<!-- Modal Cashout -->
<div class="modal fade" id="cashoutModal" tabindex="-1" aria-labelledby="cashoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cashoutModalLabel">Ringkasan Cashout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="cartTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kuantitas (kg)</th>
              <th>Harga /kg</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr class="table-primary">
              <th colspan="3" class="text-end">Total</th>
              <th id="cartTotal">Rp 0</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" id="confirmCashout">Konfirmasi Cashout</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cartCountEl = document.getElementById('cartCount');
    const cartTableBody = document.querySelector('#cartTable tbody');

    // Ambil cart dari localStorage
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

        document.getElementById('cartTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');

        // Hapus item
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', function() {
                const idx = this.dataset.index;
                cart.splice(idx, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
            });
        });
    }

    // Inisialisasi UI saat load
    updateCartUI();
});
</script>
