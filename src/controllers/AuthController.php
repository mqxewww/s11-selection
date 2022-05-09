<?php

namespace Selection\Controllers;

use Selection\Errors\InvalidInput;
use Selection\Libs\App;
use Selection\Models\AccountManager;

class AuthController
{
  private static AccountManager $accountManager;

  public function __construct()
  {
    $this::$accountManager = new AccountManager();
  }

  /**
   * `View Display` Auth > index.
   */
  public function index(): void
  {
    # User redirection if already logged in.
    if (!empty($_SESSION["auth"])) App::redirect("/" . $_SESSION["auth"] . "/home");

    require_once BASE_VIEW_PATH . "auth/index.php";

    App::clearView();
  }

  /**
   * `API Call` User authentication.
   */
  public function authentication(): void
  {
    try {
      $log = App::postFilter("accountLog", "Identifiant");
      $pass = App::postFilter("accountPwd", "Mot de passe");

      $account = $this::$accountManager->logIn($log, $pass);

      $_SESSION["auth"] = $account->getType();
      $_SESSION["user"] = $account->getLogin();
      $_SESSION["timestamp"] = time();
    } catch (InvalidInput $e) {
      $_SESSION["error"] = $e->getMessage();
    } finally {
      App::redirect("/");
    }
  }

  /**
   * `API Call` User logout.
   */
  public function logout(): void
  {
    session_destroy();
    App::redirect("/");
  }
}
