<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductosController extends Controller {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new Producto();
    }

    public function index() {
        $productos = $this->productoModel->obtenerTodos();
        $this->view('productos/index', ['productos' => $productos]);
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->productoModel->crear($_POST['nombre'], $_POST['categoria'], $_POST['precio'], $_POST['stock']);
            header('Location: ' . BASE_URL . '/productos');
            exit;
        } else {
            $this->view('productos/crear');
        }
    }

    public function eliminar($id) {
        $this->productoModel->eliminar($id);
        header('Location: ' . BASE_URL . '/productos');
        exit;
    }
}
