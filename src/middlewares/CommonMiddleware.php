<?php

namespace Selection\Middlewares;

use Selection\Libs\App;

class CommonMiddleware
{
  public function __construct()
  {
    if (empty($_SESSION["auth"])) App::redirect("/");
    if ($_SESSION["auth"] !== "secretary" && $_SESSION["auth"] !== "teacher") App::redirect("/");
  }
}
