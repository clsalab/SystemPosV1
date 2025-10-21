<?php
class HomeController extends Controller {

    public function index() {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header('Location: /SystemPosV1/public/auth/login');
            exit;
        }

        $usuario = $_SESSION['usuario'];

        // Enviar datos a la vista
        $this->view('home/index', [
            'nombre' => $usuario['nombre'],
            'rol' => $usuario['rol']
        ]);
    }
}
