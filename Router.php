<?php

namespace app;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    public ?Database $database = null;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve() {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }
        if (!$fn) {
            echo 'Page not found';
            exit;
        }

        if (is_array($fn)) {
            $controller = new $fn[0]();
            $method = $fn[1];
            echo call_user_func([$controller, $method], $this);
        } else {
            echo call_user_func($fn, $this);
        }
    }
    public function renderView($page, $params = []) {

        foreach ($params as $key => $value) {
            $$key = $value; // $$key ანუ ამით ავღწერე products ცვლადი რომელიც არის productcontroller.php-ში.. -  $router->renderView('products/index', ['products' => $products]);
        }
        ob_start();
        include __DIR__."/views/$page.php";
        $content = ob_get_clean();
        include __DIR__."/views/_layout.php";
    }
}
