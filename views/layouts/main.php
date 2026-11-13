<!DOCTYPE html>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Koperasi Sekolah</title>

    <link rel="stylesheet"
          href="<?= BASE_URL ?>/public/css/style.css">

</head>

<body>

<header class="navbar">

    <a href="<?= BASE_URL ?>/"
       class="brand">

        <span class="brand-icon">🏫</span>

        <span>Koperasi Sekolah</span>

    </a>

    <nav>

        <a href="<?= BASE_URL ?>/">
            Daftar Barang
        </a>

        <a href="<?= BASE_URL ?>/keranjang">
            Keranjang

            <span class="cart-count">
                <?= array_sum($_SESSION['keranjang'] ?? []) ?>
            </span>

        </a>

    </nav>

</header>

<main class="container">

    <?php require $content; ?>

</main>

<footer class="footer">

    <p>
        © <?= date('Y') ?> Koperasi Sekolah.
        Belanja mudah dan praktis.
    </p>

</footer>

<script src="<?= BASE_URL ?>/public/js/script.js"></script>

</body>

</html>
