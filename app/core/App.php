<?php
// app/core/App.php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/ErrorController.php';



class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

      // ✅ Verificar si el controlador existe
      if (!empty($url) && file_exists(__DIR__ . '/../controllers/' . ucfirst($url[0]) . 'Controller.php')) {
          $this->controller = ucfirst($url[0]) . 'Controller';
          unset($url[0]);
      } elseif (!empty($url)) {
          // Si se indicó un controlador pero no existe → error
          $this->controller = 'ErrorController';
      }



        require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // ✅ Verificar método
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } elseif (isset($url[1])) {
            // Opcional: redirigir a página de error
            $this->method = 'notFound';
        }

        $this->params = $url ? array_values($url) : [];

        // ✅ Ejecutar controlador
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
