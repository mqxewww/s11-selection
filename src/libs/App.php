<?php

namespace Selection\Libs;

use Selection\Errors\InvalidActionException;
use Selection\Errors\InvalidInput;
use Selection\Errors\RouteNotFoundException;
use Selection\Libs\Router;

class App
{
  private Router $router;
  private string $requestUri;

  public function __construct(Router $router, string $requestUri)
  {
    $this->router = $router;
    $this->requestUri = $requestUri;
  }

  /**
   * `APP` Application launch.
   * @return void
   */
  public function start(): void
  {
    try {
      echo $this->router->resolve($this->requestUri);
    } catch (InvalidActionException | RouteNotFoundException $e) {
      if ($e->getCode() === 404) {
        require_once BASE_VIEW_PATH . "others/route-notfound.php";
      } else {
        require_once BASE_VIEW_PATH . "others/invalid-route.php";
      }

      $this->clearView();
    }
  }

  /**
   * `APP` Deletes temporary session variables.
   * @return void
   */
  public static function clearView(): void
  {
    if (isset($_SESSION["error"])) unset($_SESSION["error"]);
    if (isset($_SESSION["success"])) unset($_SESSION["success"]);
  }

  /**
   * `APP` Returns a $_POST variable if it exists.
   * @param string $varName Variable name.
   * @param string $inputName Input name (displayed in case of error).
   * @return mixed
   * @throws InvalidInput
   */
  public static function postFilter(string $varName, string $inputName): mixed
  {
    if (!empty($_POST[$varName])) return htmlspecialchars($_POST[$varName]);
    throw new InvalidInput($inputName);
  }

  /**
   * `APP` Returns a $_GET variable if it exists.
   * @param string $varName Variable name.
   * @param string $inputName Input name (displayed in case of error).
   * @return mixed
   * @throws InvalidInput
   */
  public static function getFilter(string $varName, string $inputName): mixed
  {
    if (!empty($_GET[$varName])) return htmlspecialchars($_GET[$varName]);
    throw new InvalidInput($inputName);
  }

  /**
   * `APP` Redirects the user to a route.
   * @param string $url Route url.
   * @return void
   */
  public static function redirect(string $url): void
  {
    header("Location: " . $_ENV["PATH_TO_INDEX"] . $url);
    exit;
  }
}
