<?php
require_once '../app/core/Model.php';

class Venta extends Model {


    public function registrarVenta($idCliente, $total) {
        $stmt = $this->db->prepare("INSERT INTO ventas (id_cliente, total, fecha) VALUES (:id_cliente, :total, NOW())");
        $stmt->execute([
            ':id_cliente' => $idCliente,
            ':total' => $total
        ]);
        return $this->db->lastInsertId();
    }

    public function agregarDetalle($idVenta, $idProducto, $cantidad, $precio) {
        $stmt = $this->db->prepare("INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio)
                                    VALUES (:id_venta, :id_producto, :cantidad, :precio)");
        return $stmt->execute([
            ':id_venta' => $idVenta,
            ':id_producto' => $idProducto,
            ':cantidad' => $cantidad,
            ':precio' => $precio
        ]);
    }

    public function obtenerTodas() {
        $stmt = $this->db->query("SELECT v.*, c.nombre AS cliente
                                  FROM ventas v
                                  JOIN clientes c ON v.id_cliente = c.id
                                  ORDER BY v.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerDetalle($idVenta) {
        $stmt = $this->db->prepare("SELECT dv.*, p.nombre
                                    FROM detalle_ventas dv
                                    JOIN productos p ON dv.id_producto = p.id
                                    WHERE dv.id_venta = :id_venta");
        $stmt->bindParam(':id_venta', $idVenta, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id)
{
    $stmt = $this->db->prepare("DELETE FROM ventas WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

}
