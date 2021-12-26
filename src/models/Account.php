<?php

//======================================================================
// ACCOUNT CLASS
//======================================================================

class Account
{
  protected $id;
  protected $login;
  protected $password;
  protected $type;

  public function __construct(array $data)
  {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) $this->$method($value);
    }
  }

  //-----------------------------------------------------
  // Getters
  //-----------------------------------------------------

  public function getId()
  {
    return $this->id;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getType()
  {
    return $this->type;
  }

  //-----------------------------------------------------
  // Setters
  //-----------------------------------------------------

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setLogin(string $login)
  {
    $this->login = $login;
  }

  public function setPassword(string $password)
  {
    $this->password = $password;
  }

  public function setType(string $type)
  {
    $this->type = $type;
  }
}
