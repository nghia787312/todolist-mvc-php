<?php
namespace App\Http;

class Router
{
    CONST GET = 'GET';
    CONST POST = 'POST';

    public $routes = [];

    /**
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->handleRouter(self::GET, $uri, $controller);
    }

    /**
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {
        $this->handleRouter(self::POST, $uri, $controller);
    }

    /**
     * @param $method
     * @param $uri
     * @param $controller
     */
    public function handleRouter($method, $uri, $controller)
    {
        $this->routes[] = [
            'handler' => $controller,
            'method' => $method,
            'uri' => $uri
        ];
    }

    /**
     * @return mixed|void
     */
    public function run()
    {
        $uri = getUri();
        $callback = '';

        foreach ($this->routes as $route) {
             if ($route['uri'] == $uri) {
                 $callback = $route['handler'];
             }
        }

        if (!empty($callback)) {
            return $this->callBackController(...explode('@', $callback));
        }
        
        return view('errors.404');
    }


    /**
     * @param $controller
     * @param $callback
     * @return mixed
     */
    private function callBackController($controller, $callback)
    {
        $controller =  "App\\Http\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $callback)) {
            throw new Exception("{$controller} does not have {$callback}");
        }

        return $controller->{$callback}();
    }
}