<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="dashboard">
    <h2>Bienvenido, <?= htmlspecialchars($data['nombre']); ?> 🎉</h2>
    <p>Tu rol es: <strong><?= htmlspecialchars($data['rol']); ?></strong></p>

    <hr>

    <?php if ($data['rol'] === 'admin'): ?>
        <h3>Panel de Administrador</h3>
        <ul>
            <li><a href="/SystemPosV1/public/productos">Gestión de Productos</a></li>
            <li><a href="/SystemPosV1/public/clientes">Gestión de Clientes</a></li>
            <li><a href="/SystemPosV1/public/ventas">Ver Ventas</a></li>
            <li><a href="/SystemPosV1/public/usuarios">Gestión de Usuarios</a></li>
        </ul>

    <?php elseif ($data['rol'] === 'vendedor'): ?>
        <h3>Panel de Vendedor</h3>
        <ul>
            <li><a href="/SystemPosV1/public/ventas/nueva">Registrar Venta</a></li>
            <li><a href="/SystemPosV1/public/ventas">Mis Ventas</a></li>
            <li><a href="/SystemPosV1/public/clientes">Mis Clientes</a></li>
        </ul>

    <?php else: ?>
        <p>No tienes permisos asignados.</p>
    <?php endif; ?>

    <hr>
    <a href="/SystemPosV1/public/auth/logout" class="btn">Cerrar sesión</a>
</div>

<style>
.dashboard {
    max-width: 600px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    font-family: Arial;
}
.dashboard ul { list-style: none; padding: 0; }
.dashboard li { margin: 10px 0; }
.dashboard a {
    text-decoration: none;
    color: #007bff;
}
.dashboard a:hover { text-decoration: underline; }
.btn {
    display: inline-block;
    padding: 10px 15px;
    background: #dc3545;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
.btn:hover { background: #c82333; }
</style>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
