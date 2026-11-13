
<?php

require_once __DIR__ . '/config/config.php';

require_once __DIR__ . '/app/models/Barang.php';

require_once __DIR__ . '/app/controllers/KeranjangController.php';

// Membuat controller
$controller = new KeranjangController();

// Mengambil URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Menghilangkan BASE_URL
$path = substr($uri, strlen(BASE_URL));

$path = trim($path, '/');

// Halaman default
$path = $path ?: 'barang';

$content = '';
$viewData = [];

switch ($path) {

    // Halaman daftar barang
    case 'barang':

        $viewData = $controller->barang();

        $content = VIEW_PATH . 'barang/index.php';

        break;

    // Halaman keranjang
    case 'keranjang':

        $viewData = $controller->index();

        $content = VIEW_PATH . 'keranjang/index.php';

        break;

    // Tambah barang
    case 'keranjang/tambah':

        $controller->tambah();

        break;

    // Kurangi barang
    case 'keranjang/kurang':

        $controller->kurang();

        break;

    // Hapus barang
    case 'keranjang/hapus':

        $controller->hapus();

        break;

    default:

        http_response_code(404);

        echo '<h1>404 - Halaman Tidak Ditemukan</h1>';

        exit;
}

// Mengirim data ke halaman
extract($viewData);

// Memanggil layout utama
require VIEW_PATH . 'layouts/main.php';
