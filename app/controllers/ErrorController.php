<?php

class ErrorController {
    public function index() {
        echo "<h1>Error 404 - Página no encontrada</h1>";
    }

    public function notFound() {
        echo "<h1>Error 404 - Controlador o método inexistente</h1>";
    }
}
