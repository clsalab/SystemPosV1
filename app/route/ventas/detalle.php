

<div class="container mt-4">
    <h2 class="mb-4">🧾 Detalle de la Venta</h2>

    <?php if ($data['venta']): ?>
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> <?= htmlspecialchars($data['venta']['id']); ?></li>
            <li class="list-group-item"><strong>Cliente ID:</strong> <?= htmlspecialchars($data['venta']['cliente_id']); ?></li>
            <li class="list-group-item"><strong>Productos:</strong>
                <?= htmlspecialchars($data['venta']['productos']); ?>
            </li>
            <li class="list-group-item"><strong>Total:</strong> $<?= number_format($data['venta']['total'], 2); ?></li>
            <li class="list-group-item"><strong>Fecha:</strong> <?= htmlspecialchars($data['venta']['fecha']); ?></li>
        </ul>

        <a href="<?= BASE_URL ?>/ventas" class="btn btn-secondary">⬅️ Volver al listado</a>
    <?php else: ?>
        <div class="alert alert-warning">No se encontró la venta solicitada.</div>
    <?php endif; ?>
</div>


