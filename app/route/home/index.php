<div class="dashboard">
    <header class="dashboard-header">
        <h2>👋 ¡Hola, <?= htmlspecialchars($data['nombre']); ?>!</h2>
        <p>Bienvenido a tu panel <strong><?= htmlspecialchars(ucfirst($data['rol'])); ?></strong></p>
    </header>

    <section class="dashboard-content">
        <?php if ($data['rol'] === 'admin'): ?>
            <h3>Panel de Administración</h3>
            <div class="card-grid">
                <a class="card" href="<?= BASE_URL ?>/productos">
                    <div class="icon">📦</div>
                    <h4>Productos</h4>
                    <p>Gestiona tu inventario</p>
                </a>
                <a class="card" href="<?= BASE_URL ?>/clientes">
                    <div class="icon">👥</div>
                    <h4>Clientes</h4>
                    <p>Administra tu base de clientes</p>
                </a>
                <a class="card" href="<?= BASE_URL ?>/ventas">
                    <div class="icon">💰</div>
                    <h4>Ventas</h4>
                    <p>Consulta el historial de ventas</p>
                </a>
                <a class="card" href="<?= BASE_URL ?>/usuarios">
                    <div class="icon">🧑‍💼</div>
                    <h4>Usuarios</h4>
                    <p>Controla accesos y roles</p>
                </a>
            </div>

        <?php elseif ($data['rol'] === 'vendedor'): ?>
            <h3>Panel de Ventas</h3>
            <div class="card-grid">
                <a class="card" href="<?= BASE_URL ?>/ventas/nueva">
                    <div class="icon">🧾</div>
                    <h4>Nueva Venta</h4>
                    <p>Registra una nueva transacción</p>
                </a>
                <a class="card" href="<?= BASE_URL ?>/ventas">
                    <div class="icon">📊</div>
                    <h4>Mis Ventas</h4>
                    <p>Consulta tus operaciones</p>
                </a>
                <a class="card" href="<?= BASE_URL ?>/clientes">
                    <div class="icon">🤝</div>
                    <h4>Clientes</h4>
                    <p>Gestiona tus contactos</p>
                </a>
            </div>

        <?php else: ?>
            <p class="no-access">⚠️ No tienes permisos asignados.</p>
        <?php endif; ?>
    </section>


</div>
