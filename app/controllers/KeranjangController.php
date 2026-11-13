
<?php

class KeranjangController
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = new Barang();

        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = [];
        }
    }

    public function barang()
    {
        $barang = $this->barangModel->semua();

        return [
            'barang' => $barang
        ];
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/');
        }

        $id = (int) ($_POST['id'] ?? 0);

        $barang = $this->barangModel->cari($id);

        if (!$barang || $barang['stok'] <= 0) {
            redirect('/');
        }

        $jumlah = $_SESSION['keranjang'][$id] ?? 0;

        if ($jumlah < $barang['stok']) {
            $_SESSION['keranjang'][$id] = $jumlah + 1;
        }

        redirect('/');
    }

    public function kurang()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/');
        }

        $id = (int) ($_POST['id'] ?? 0);

        if (isset($_SESSION['keranjang'][$id])) {

            $_SESSION['keranjang'][$id]--;

            if ($_SESSION['keranjang'][$id] <= 0) {
                unset($_SESSION['keranjang'][$id]);
            }
        }

        redirect('/keranjang');
    }

    public function index()
    {
        $keranjang = [];
        $total = 0;

        foreach ($_SESSION['keranjang'] as $id => $jumlah) {

            $barang = $this->barangModel->cari($id);

            if (!$barang || $barang['stok'] <= 0) {
                unset($_SESSION['keranjang'][$id]);
                continue;
            }

            $jumlah = min($jumlah, $barang['stok']);

            $_SESSION['keranjang'][$id] = $jumlah;

            $subtotal = $barang['harga'] * $jumlah;

            $barang['jumlah'] = $jumlah;
            $barang['subtotal'] = $subtotal;

            $keranjang[] = $barang;

            $total += $subtotal;
        }

        return [
            'keranjang' => $keranjang,
            'total' => $total
        ];
    }

    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/keranjang');
        }

        $id = (int) ($_POST['id'] ?? 0);

        unset($_SESSION['keranjang'][$id]);

        redirect('/keranjang');
    }
}
