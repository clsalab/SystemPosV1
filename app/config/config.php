<?php
/**
 * CONFIGURACIÓN GLOBAL DEL SISTEMA
 * Ajusta solo esta constante si cambias el nombre de la carpeta del proyecto.
 */

// Ruta base del sistema (ajusta según tu carpeta dentro de htdocs)
define('BASE_URL', '/SystemPosV1/public');

// Nombre del sistema (opcional)
define('APP_NAME', 'System POS V1');

// Zona horaria
date_default_timezone_set('America/Bogota');

// Modo depuración (TRUE muestra errores, FALSE los oculta)
define('DEBUG', true);

if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
