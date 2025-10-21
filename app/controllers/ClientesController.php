<?php
// app/models/Cliente.php

require_once __DIR__ . '/../config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        // Conexión mediante la clase Database
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Obtener todos los clientes
     */
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un cliente por su ID
     */
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crear un nuevo cliente
     */
    public function create($nombre, $email, $telefono)
    {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, email, telefono) VALUES (:nombre, :email, :telefono)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        return $stmt->execute();
    }

    /**
     * Actualizar un cliente existente
     */
    public function update($id, $nombre, $email, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE clientes SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        return $stmt->execute();
    }

    /**
     * Eliminar un cliente
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
