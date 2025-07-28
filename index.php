<?php

require 'config/conn.php';

$page = $_GET['page'] ?? 'home';  // Jika tidak ada page, set default ke 'home'

// Periksa apakah file halaman yang diminta ada
if ($page === 'home') {
    // Jika halaman adalah 'home', cukup tampilkan home.php tanpa header dan footer
    require 'pages/home.php';
} elseif (file_exists('pages/' . $page . '.php')) {
    // Jika file halaman yang diminta ada, tampilkan header, halaman, dan footer
    require 'template/header.php';
    require 'pages/' . $page . '.php';
    require 'template/footer.php';
} else {
    // Jika file halaman yang diminta tidak ada, tampilkan halaman 404
    require '404.php';
    exit;
}
