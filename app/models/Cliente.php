<?php
require_once '../app/core/Model.php';

class Cliente extends Model {

    // 🔹 Obtener todos los clientes
    public function obtenerTodos() {
        $stmt = $this->db->prepare("SELECT * FROM clientes ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Obtener un cliente por ID
    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Crear un nuevo cliente
    public function crear($data) {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, email, telefono, direccion)
                                    VALUES (:nombre, :email, :telefono, :direccion)");
        $stmt->execute([
            ':nombre'    => $data['nombre'],
            ':email'     => $data['email'],
            ':telefono'  => $data['telefono'],
            ':direccion' => $data['direccion']
        ]);
        return $this->db->lastInsertId();
    }

    // 🔹 Actualizar un cliente existente
    public function actualizar($id, $data) {
        $stmt = $this->db->prepare("UPDATE clientes
                                    SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion
                                    WHERE id = :id");
        return $stmt->execute([
            ':nombre'    => $data['nombre'],
            ':email'     => $data['email'],
            ':telefono'  => $data['telefono'],
            ':direccion' => $data['direccion'],
            ':id'        => $id
        ]);
    }

    // 🔹 Eliminar un cliente
    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // 🔹 Buscar clientes por nombre o correo
    public function buscar($termino) {
        $stmt = $this->db->prepare("SELECT * FROM clientes
                                    WHERE nombre LIKE :term OR email LIKE :term
                                    ORDER BY nombre ASC");
        $likeTerm = "%{$termino}%";
        $stmt->bindParam(':term', $likeTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
