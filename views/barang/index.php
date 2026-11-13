
<div class="page-heading">
    <h1>Daftar Barang Koperasi</h1>
    <p>Pilih barang kebutuhan sekolahmu.</p>
</div>

<div class="product-grid">

    <?php foreach ($barang as $item): ?>

        <?php
        $jumlah = $_SESSION['keranjang'][$item['id']] ?? 0;
        ?>

        <div class="product-card">

            <div class="product-icon">
                <?php
                $ikon = [
                    'Pulpen' => '🖊️',
                    'Buku Tulis' => '📓',
                    'Pensil' => '✏️',
                    'Penghapus' => '🧽',
                    'Penggaris' => '📏',
                    'Roti Cokelat' => '🍞'
                ];

                echo $ikon[$item['nama']] ?? '🛍️';
                ?>
            </div>

            <div class="product-info">

                <h3>
                    <?= htmlspecialchars($item['nama']) ?>
                </h3>

                <p class="price">
                    <?= rupiah($item['harga']) ?>
                </p>

                <p class="stock">
                    Stok: <?= $item['stok'] ?>
                </p>

                <div class="quantity-control">

                    <form action="<?= BASE_URL ?>/keranjang/kurang"
                          method="POST">

                        <input type="hidden"
                               name="id"
                               value="<?= $item['id'] ?>">

                        <button type="submit"
                                class="btn-minus">
                            −
                        </button>

                    </form>

                    <span class="quantity">
                        <?= $jumlah ?>
                    </span>

                    <form action="<?= BASE_URL ?>/keranjang/tambah"
                          method="POST">

                        <input type="hidden"
                               name="id"
                               value="<?= $item['id'] ?>">

                        <button type="submit"
                                class="btn-plus"
                                <?= $jumlah >= $item['stok'] ? 'disabled' : '' ?>>
                            +
                        </button>

                    </form>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<div class="floating-cart">

    <div>
        <strong>Keranjang Belanja</strong>
        <p>
            <?= array_sum($_SESSION['keranjang'] ?? []) ?>
            barang dipilih
        </p>
    </div>

    <a href="<?= BASE_URL ?>/keranjang"
       class="btn-primary">
        Lihat Keranjang →
    </a>

</div>
