<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../models/Usuario.php';

class AuthController extends Controller {

    // Página principal del login
    public function index() {
        // Mostrar el formulario sin encabezado ni pie
        $this->view('auth/login', [], false);
    }

    // Procesa el inicio de sesión
    public function login() {
        $usuarioModel = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $usuario = $usuarioModel->verificarCredenciales($email, $password);

            if ($usuario) {
                // Guardar datos del usuario en la sesión
                $_SESSION['usuario'] = [
                    'id'     => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'rol'    => $usuario['rol']
                ];

                // Redirigir al inicio del sistema
                $this->redirect(BASE_URL . '/home');
            } else {
                // Mostrar error sin encabezado ni pie
                $this->view('auth/login', ['error' => 'Correo o contraseña incorrectos'], false);
            }
        } else {
            // Si no es POST, simplemente mostrar el login vacío
            $this->view('auth/login', [], false);
        }
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        $this->redirect(BASE_URL . '/auth/login');
    }
}
