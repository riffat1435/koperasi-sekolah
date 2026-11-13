
<?php

session_start();

define('BASE_URL', '/koperasi-sekolah');

define('ROOT_PATH', dirname(__DIR__));

define('DATA_PATH', ROOT_PATH . '/data/');

define('VIEW_PATH', ROOT_PATH . '/views/');

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function redirect($url)
{
    header('Location: ' . BASE_URL . $url);
    exit;
}
