<?php
require_once '../app/core/Model.php';

class Producto extends Model {

    // 🔹 Obtener todos los productos
    public function obtenerTodos() {
        $stmt = $this->db->prepare("SELECT * FROM productos ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Obtener un producto por su ID
    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Crear un nuevo producto
    public function crear($data) {
        $stmt = $this->db->prepare("INSERT INTO productos (nombre, categoria, precio, stock)
                                    VALUES (:nombre, :categoria, :precio, :stock)");
        $stmt->execute([
            ':nombre'    => $data['nombre'],
            ':categoria' => $data['categoria'],
            ':precio'    => $data['precio'],
            ':stock'     => $data['stock']
        ]);
        return $this->db->lastInsertId();
    }

    // 🔹 Actualizar un producto existente
    public function actualizar($id, $data) {
        $stmt = $this->db->prepare("UPDATE productos
                                    SET nombre = :nombre, categoria = :categoria, precio = :precio, stock = :stock
                                    WHERE id = :id");
        return $stmt->execute([
            ':nombre'    => $data['nombre'],
            ':categoria' => $data['categoria'],
            ':precio'    => $data['precio'],
            ':stock'     => $data['stock'],
            ':id'        => $id
        ]);
    }

    // 🔹 Eliminar un producto
    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // 🔹 Buscar productos por nombre o categoría (útil para buscador)
    public function buscar($termino) {
        $stmt = $this->db->prepare("SELECT * FROM productos
                                    WHERE nombre LIKE :term OR categoria LIKE :term
                                    ORDER BY nombre ASC");
        $likeTerm = "%{$termino}%";
        $stmt->bindParam(':term', $likeTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
