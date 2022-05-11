<?php

namespace Selection\Errors;

class RouteNotFoundException extends \Exception
{
  protected $message = "Erreur : Cette route n'existe pas.";
}
