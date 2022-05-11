<?php

namespace Selection\Middlewares;

use Selection\Libs\App;

class SecretaryMiddleware
{
  public function __construct()
  {
    if (empty($_SESSION["auth"])) App::redirect("/");
    if ($_SESSION["auth"] !== "secretary") App::redirect("/");
  }
}
