<?php
// app/models/Usuario.php
require_once '../app/core/Model.php';

class Usuario extends Model {

    // 🔹 Verificar credenciales (login)
    public function verificarCredenciales($email, $password) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario; // Devuelve todos los datos del usuario
        }

        return false; // No coincide
    }

    // 🔹 Crear un nuevo usuario (por ejemplo, desde un panel admin)
    public function crear($data) {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol)
                VALUES (:nombre, :email, :password, :rol)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre'   => $data['nombre'],
            ':email'    => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
            ':rol'      => $data['rol'] ?? 'vendedor'
        ]);
    }

    // 🔹 Obtener usuario por ID
    public function obtenerPorId($id) {
        $sql = "SELECT id, nombre, email, rol FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Obtener todos los usuarios (para listar en panel)
    public function obtenerTodos() {
        $stmt = $this->db->query("SELECT id, nombre, email, rol FROM usuarios ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Eliminar usuario
    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
