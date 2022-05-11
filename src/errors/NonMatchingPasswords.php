<?php

namespace Selection\Errors;

class NonMatchingPasswords extends \Exception
{
  protected $message = "Erreur : Les mots de passe ne correspondent pas.";
}
