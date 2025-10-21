<?php
class HomeController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $usuario = $_SESSION['usuario'];

        $this->view('home/index', [
            'nombre' => $usuario['nombre'],
            'rol' => $usuario['rol']
        ]);
    }
}
