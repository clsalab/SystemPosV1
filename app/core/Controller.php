<?php
require_once __DIR__ . '/../config/config.php';

class Controller {
    // Método para renderizar vistas
    protected function view($viewPath, $data = [], $withLayout = true) {
        $viewFile = __DIR__ . '/../route/' . $viewPath . '.php';
        if (file_exists($viewFile)) {
            $data = $data ?? [];
            if ($withLayout) {
                require __DIR__ . '/../route/layouts/header.php';
                require $viewFile;
                require __DIR__ . '/../route/layouts/footer.php';
            } else {
                require $viewFile;
            }
        } else {
            http_response_code(404);
            echo "***Vista no encontrada: $viewPath***";
        }
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
