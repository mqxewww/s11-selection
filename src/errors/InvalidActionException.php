<?php

namespace Selection\Errors;

class InvalidActionException extends \Exception
{
  protected $code = 500;
  protected $message = "Erreur : La classe ou la méthode renseignée n'existe pas.";
}
