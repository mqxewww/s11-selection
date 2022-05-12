<?php

namespace Selection\Errors;

class RouteNotFoundException extends \Exception
{
  protected $code = 404;
  protected $message = "Erreur : Cette route n'existe pas.";
}
