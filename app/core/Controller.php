<?php
// app/core/Controller.php

class Controller {
    // render view: $this->view('clientes/index', ['clientes'=>$clientes]);
    protected function view($viewPath, $data = []) {
        $viewFile = __DIR__ . '/../route/' . $viewPath . '.php';
        if (file_exists($viewFile)) {
            // pasar datos a la vista
            $data = $data ?? [];
            require __DIR__ . '/../route/layouts/header.php';
            require $viewFile;
            require __DIR__ . '/../route/layouts/footer.php';
        } else {
            http_response_code(404);
            echo "***Vista no encontrada: $viewPath***";
        }
    }

    // helper para redirecciones
    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
