<?php
namespace App\Core;
class Router
{
  public $routes = [
    'GET' => [],
    'POST' => []
  ];
  public static function load($file)
  {
    $router = new static;
    require $file;
    return $router;
  }
  public function get($route, $controller, $auth = false)
  {
    $this->routes['GET'][$route] = [$controller, $auth];
  }
  public function post($route, $controller, $auth = false)
  {
    $this->routes['POST'][$route] = [$controller, $auth];
  }
  public function direct($uri, $requestMethod) {
    $route = $this->matchRoute($this->routes[$requestMethod], $uri);
    if(!is_null($route)) {
      if($route[1]) {
        if(isset($_SESSION['auth'])){
          $this->callAction(...explode('@', $route[0]));

        }else{
          json_encode('login failed');
        }
      }else{
        $exploded = explode('@', $route[0]);
        $route['controller'] = $exploded[0];
        $route['action'] = $exploded[1];
        if (isset($route['parameters'])){
          $this->callAction($route['controller'], $route['action'], $route['parameters']);
        } else {
          $this->callAction($route['controller'], $route['action']);
        }
      }
    } else {
//      require "views/404.view.php";
    }
  }
  /**
   * @param array $routes
   * @param string $uri
   * @return null|array
   */
  private function matchRoute($routes, $uri)
  {
    $uriParts = explode('/', $uri);
    foreach ($routes as $route => $routeData) {
      $routeParts = explode('/', $route);
      if (count($uriParts) !== count($routeParts)) {
        continue;
      }
      $matched = false;
      for ($i = 0; $i < count($uriParts); $i++) {
        if ($uriParts[$i] === $routeParts[$i]) {
          $matched = true;
          continue;
        }
        if (false !== strpos($routeParts[$i], '{') && $uriParts[$i-1] === $routeParts[$i-1]) {
          $paramName = trim($routeParts[$i],'{\}');
          $matched = true;
          $routeData['parameters'][$paramName] = $uriParts[$i];
          continue;
        }
        else {
          $matched = false;
        }
      }
      if ($matched) {
        return $routeData;
      }
    }
    return null;
  }
  public function callAction($controller, $method, $params = null) {
    $c = "\\App\\Controllers\\{$controller}";
    $c = new $c;
    if(!method_exists($c, $method)) {
      throw new \Exception('No method');
    }
    return $c->$method($params);
  }
}
