<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route)
        {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){

                Middleware::resolve($route['middleware']);

                return require base_path('Http/Controllers/'.$route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        view("$code.php");
        die();
    }
}




//
//    $routers = require base_path("routes.php");
//
//    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//    routeToController($uri, $routers);
//    function routeToController($uri, $routers)
//    {
//        if(array_key_exists($uri, $routers)){
//            require base_path($routers[$uri]);
//        }
//        else{
//            abort();
//        }
//    }
//
//    function abort($code = 404)
//    {
//        http_response_code($code);
//
//        require base_path("views/$code.php");
//        die();
//    }
//
