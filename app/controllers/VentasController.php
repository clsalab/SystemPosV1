<?php
require_once __DIR__ . '/../models/Venta.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Producto.php';

class VentasController extends Controller
{
    private $ventaModel;
    private $clienteModel;
    private $productoModel;

    public function __construct()
    {
        $this->ventaModel = new Venta();
        $this->clienteModel = new Cliente();
        $this->productoModel = new Producto();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    }

    /**
     * Mostrar todas las ventas registradas
     */
    public function index()
    {
        $ventas = $this->ventaModel->obtenerTodas();
        $this->view('ventas/index', ['ventas' => $ventas]);
    }

    /**
     * Mostrar formulario para nueva venta o procesar el POST
     */
    public function nueva()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente_id = $_POST['cliente_id'];
            $productos = $_POST['productos']; // Puedes enviar IDs o un JSON con cantidades
            $total = $_POST['total'];

            $this->ventaModel->registrar($cliente_id, json_encode($productos), $total);
            header('Location: ' . BASE_URL . '/ventas');
            exit;
        } else {
            // Cargar datos para el formulario
            $clientes = $this->clienteModel->obtenerTodos();
            $productos = $this->productoModel->obtenerTodos();

            $this->view('ventas/nueva', [
                'clientes' => $clientes,
                'productos' => $productos
            ]);
        }
    }

    /**
     * Ver detalle de una venta
     */
    public function detalle($id)
    {
        $venta = $this->ventaModel->obtenerPorId($id);

        if (!$venta) {
            echo "Venta no encontrada.";
            return;
        }

        $this->view('ventas/detalle', ['venta' => $venta]);
    }

    /**
     * Eliminar una venta
     */
    public function eliminar($id)
    {
        $this->ventaModel->eliminar($id);
        header('Location: ' . BASE_URL . '/ventas');
        exit;
    }
}
