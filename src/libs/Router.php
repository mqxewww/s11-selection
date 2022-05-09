<?php

namespace Selection\Libs;

use Selection\Errors\InvalidActionException;
use Selection\Errors\RouteNotFoundException;
use Selection\Middlewares\AppMiddleware;

class Router
{
  private array $routes;

  /**
   * `Router` Registers a new route in the router.
   * @param \string $path URI.
   * @param array $action ...
   * @return void
   */
  public function register(string $path, array $action): void
  {
    $this->routes[$path] = $action;
  }

  /**
   * `Router` Resolve the route to be used.
   * @param \string $uri URI.
   * @return mixed
   * @throws InvalidActionException|RouteNotFoundException
   */
  public function resolve(string $uri): mixed
  {
    new AppMiddleware();

    $path = explode('?', $uri)[0];
    $action = $this->routes[$path] ?? null;

    if (is_array($action)) {
      [$className, $method, $middleware] = $action;

      if (class_exists($className) && method_exists($className, $method)) {
        if (class_exists($middleware)) new $middleware();

        $class = new $className();
        return call_user_func_array([$class, $method], []);
      }

      throw new InvalidActionException();
    }

    throw new RouteNotFoundException();
  }
}
