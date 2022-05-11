<?php

namespace Selection\Errors;

class InvalidInput extends \Exception
{
  protected $message;

  public function __construct(string $inputName)
  {
    $this->message = "Erreur : " . $inputName . " invalide(s).";
  }
}
