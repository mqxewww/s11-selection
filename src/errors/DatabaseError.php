<?php

namespace Selection\Errors;

class DatabaseError extends \Exception
{
  protected $message;

  public function __construct(string $pdoError)
  {
    $this->message = "Erreur liée à la base de données : " . $pdoError;
  }
}
