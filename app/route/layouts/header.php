<?php
require_once __DIR__ . '/../../../app/config/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= APP_NAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos globales -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/estilo.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/dashboard.css">

    <!-- JS -->
    <script src="<?= BASE_URL ?>/assets/js/funciones.js" defer></script>
</head>
<body>
<header class="navbar">
    <div class="container" style="display:flex; justify-content:space-between; align-items:center; padding:0.5rem 1rem;">
        <div class="navbar-brand" style="font-size:1.2rem; color:white; font-weight:600;">
            <?= APP_NAME ?>
        </div>

        <nav>
            <ul style="display:flex; list-style:none; margin:0; padding:0; gap:1rem;">
                <li><a class="nav-link" href="<?= BASE_URL ?>/home">🏠 Inicio</a></li>
                <li><a class="nav-link" href="<?= BASE_URL ?>/productos">📦 Productos</a></li>
                <li><a class="nav-link" href="<?= BASE_URL ?>/clientes">👥 Clientes</a></li>
                <li><a class="nav-link" href="<?= BASE_URL ?>/ventas">💰 Ventas</a></li>
                <li><a class="btn btn-eliminar" href="<?= BASE_URL ?>/auth/logout">🚪 Salir</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="main-content" style="padding:1.5rem 2rem;">
