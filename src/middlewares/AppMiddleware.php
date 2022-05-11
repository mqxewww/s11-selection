<?php

namespace Selection\Middlewares;

use Selection\Libs\App;

class AppMiddleware
{
  public function __construct()
  {
    if (isset($_SESSION["timestamp"]) && !empty($_SESSION["timestamp"])) {

      # Expired session.
      if (time() - $_SESSION["timestamp"] > 1200) {
        session_unset();
        $_SESSION["error"] = "Erreur : Vous avez été déconnecté pour inactivité. (+ de 20 minutes)";
        App::redirect("/");
      }

      # Reset session timestamp.
      $_SESSION["timestamp"] = time();
    }
  }
}
