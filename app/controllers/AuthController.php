<?php
class AuthController extends Controller {

    public function index() {
        $this->view('auth/login');
    }

    public function login() {
        require_once __DIR__ . '/../models/Usuario.php';
        $usuarioModel = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = $usuarioModel->verificarCredenciales($email, $password);

            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'rol' => $usuario['rol']
                ];

                // ✅ Redirige al dashboard
                header('Location: /SystemPosV1/public/home');
                exit;
            } else {
                $this->view('auth/login', ['error' => 'Correo o contraseña incorrectos']);
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /SystemPosV1/public/auth/login');
        exit;
    }
}
