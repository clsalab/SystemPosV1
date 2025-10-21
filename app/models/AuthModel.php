<?php
// app/models/AuthModel.php

class AuthModel extends Model {

    public function verificarUsuario($email, $password) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            // Comparar contraseñas (usa password_hash y password_verify)
            if (password_verify($password, $usuario['password'])) {
                return $usuario;
            }
        }
        return false;
    }
}
