<?php

namespace Selection\Middlewares;

use Selection\Libs\App;

class AdminMiddleware
{
  public function __construct()
  {
    if (empty($_SESSION["auth"])) App::redirect("/");
    if ($_SESSION["auth"] !== "admin") App::redirect("/");
  }
}
