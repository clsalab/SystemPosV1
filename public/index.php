<?php
/**
 * PUNTO DE ENTRADA PRINCIPAL DEL SISTEMA
 * System POS V1
 * Autor: Cleiber Salas Baldovino
 */

// Habilitar informes de errores en modo desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// -----------------------------------------------------
// 1️⃣ Cargar configuración general y clases base
// -----------------------------------------------------
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/core/App.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Model.php';

// -----------------------------------------------------
// 2️⃣ Iniciar sesión si no existe
// -----------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// -----------------------------------------------------
// 3️⃣ Instanciar la aplicación principal
// -----------------------------------------------------
$app = new App();
