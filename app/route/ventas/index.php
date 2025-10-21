

<div class="container mt-4">
    <h2 class="mb-4">📋 Listado de Ventas</h2>

    <a href="<?= BASE_URL ?>/ventas/nueva" class="btn btn-success mb-3">➕ Nueva Venta</a>

    <?php if (!empty($data['ventas'])): ?>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['ventas'] as $venta): ?>
                    <tr>
                        <td><?= htmlspecialchars($venta['id']); ?></td>
                        <td><?= htmlspecialchars($venta['cliente_id']); ?></td>
                        <td>$<?= number_format($venta['total'], 2); ?></td>
                        <td><?= htmlspecialchars($venta['fecha']); ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>/ventas/detalle/<?= $venta['id']; ?>" class="btn btn-sm btn-primary">Ver</a>
                            <a href="<?= BASE_URL ?>/ventas/eliminar/<?= $venta['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta venta?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alert alert-info">No hay ventas registradas aún.</p>
    <?php endif; ?>
</div>

