

<div class="container mt-4">
    <h2 class="mb-4">🛒 Registrar Nueva Venta</h2>

    <form method="POST" action="<?= BASE_URL ?>/ventas/nueva">
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-select" required>
                <option value="">Selecciona un cliente</option>
                <?php foreach ($data['clientes'] as $cliente): ?>
                    <option value="<?= $cliente['id']; ?>">
                        <?= htmlspecialchars($cliente['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="productos" class="form-label">Productos</label>
            <select multiple name="productos[]" id="productos" class="form-select" required>
                <?php foreach ($data['productos'] as $producto): ?>
                    <option value="<?= $producto['id']; ?>">
                        <?= htmlspecialchars($producto['nombre']); ?> ($<?= number_format($producto['precio'], 2); ?>)
                    </option>
                <?php endforeach; ?>
            </select>
            <small class="text-muted">Mantén presionada CTRL para seleccionar varios productos.</small>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total (COP)</label>
            <input type="number" step="0.01" name="total" id="total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Guardar Venta</button>
        <a href="<?= BASE_URL ?>/ventas" class="btn btn-secondary">⬅️ Volver</a>
    </form>
</div>


