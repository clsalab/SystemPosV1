<?php
require_once __DIR__ . '/app/config/database.php';

try {
    $db = Database::getInstance()->getConnection();
    echo "<h3 style='color:green'>✅ ***Conexión exitosa a la base de datos.***</h3>";
} catch (Exception $e) {
    echo "<h3 style='color:red'>❌ ***Error al conectar:</h3> ***" . $e->getMessage();
}
