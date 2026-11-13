
<div class="page-heading">

    <h1>Keranjang Belanja</h1>

    <p>Periksa barang yang sudah kamu pilih.</p>

</div>

<?php if (!empty($_SESSION['pesan'])): ?>

    <div class="alert">
        <?= htmlspecialchars($_SESSION['pesan']) ?>
    </div>

    <?php unset($_SESSION['pesan']); ?>

<?php endif; ?>

<?php if (empty($keranjang)): ?>

    <div class="empty-cart">

        <div class="empty-icon">🛒</div>

        <h2>Keranjang Masih Kosong</h2>

        <p>Silakan pilih barang terlebih dahulu.</p>

        <a href="<?= BASE_URL ?>/"
           class="btn-primary">
            Mulai Belanja
        </a>

    </div>

<?php else: ?>

    <div class="cart-container">

        <div class="cart-list">

            <?php foreach ($keranjang as $item): ?>

                <div class="cart-item">

                    <div class="cart-info">

                        <h3>
                            <?= htmlspecialchars($item['nama']) ?>
                        </h3>

                        <p>
                            Harga:
                            <?= rupiah($item['harga']) ?>
                        </p>

                        <div class="quantity-control">

                            <form action="<?= BASE_URL ?>/keranjang/kurang"
                                  method="POST">

                                <input type="hidden"
                                       name="id"
                                       value="<?= $item['id'] ?>">

                                <button class="btn-minus">−</button>

                            </form>

                            <span class="quantity">
                                <?= $item['jumlah'] ?>
                            </span>

                            <form action="<?= BASE_URL ?>/keranjang/tambah"
                                  method="POST">

                                <input type="hidden"
                                       name="id"
                                       value="<?= $item['id'] ?>">

                                <button class="btn-plus"
                                        <?= $item['jumlah'] >= $item['stok'] ? 'disabled' : '' ?>>
                                    +
                                </button>

                            </form>

                        </div>

                    </div>

                    <div class="cart-right">

                        <strong class="subtotal">
                            <?= rupiah($item['subtotal']) ?>
                        </strong>

                        <form action="<?= BASE_URL ?>/keranjang/hapus"
                              method="POST">

                            <input type="hidden"
                                   name="id"
                                   value="<?= $item['id'] ?>">

                            <button type="submit"
                                    class="btn-delete">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="cart-summary">

            <h2>Ringkasan Belanja</h2>

            <div class="summary-row">

                <span>Total Jenis Barang</span>

                <strong>
                    <?= count($keranjang) ?>
                </strong>

            </div>

            <div class="summary-row">

                <span>Total Jumlah Barang</span>

                <strong>
                    <?= array_sum(array_column($keranjang, 'jumlah')) ?>
                </strong>

            </div>

            <div class="summary-total">

                <span>Total Belanja</span>

                <h2>
                    <?= rupiah($total) ?>
                </h2>

            </div>

            <a href="<?= BASE_URL ?>/"
               class="btn-secondary full">
                + Tambah Barang
            </a>

            <button onclick="window.print()"
                    class="btn-primary full">
                Cetak Ringkasan
            </button>

        </div>

    </div>

<?php endif; ?>
