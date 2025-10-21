<?php
// app/models/Cliente.php

require_once __DIR__ . '/../config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Obtener todos los clientes
     */
    public function obtenerTodos()
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un cliente por su ID
     */
    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crear un nuevo cliente
     */
    public function crear($nombre, $email, $telefono, $direccion)
    {
        $stmt = $this->db->prepare("
            INSERT INTO clientes (nombre, email, telefono, direccion)
            VALUES (:nombre, :email, :telefono, :direccion)
        ");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        return $stmt->execute();
    }

    /**
     * Actualizar un cliente existente
     */
    public function actualizar($id, $nombre, $email, $telefono, $direccion)
    {
        $stmt = $this->db->prepare("
            UPDATE clientes
            SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion
            WHERE id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        return $stmt->execute();
    }

    /**
     * Eliminar un cliente
     */
    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
