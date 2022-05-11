<?php

namespace Selection\Middlewares;

use Selection\Libs\App;

class TeacherMiddleware
{
  public function __construct()
  {
    if (empty($_SESSION["auth"])) App::redirect("/");
    if ($_SESSION["auth"] !== "teacher") App::redirect("/");
  }
}
