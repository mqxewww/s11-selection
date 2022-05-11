<?php

namespace Selection\Models;

class Account
{
  protected int $id;
  protected string $login;
  protected string $password;
  protected string $type;

  public function __construct(array $data)
  {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) $this->$method($value);
    }
  }

  /** `Getter` id. */
  public function getId(): int
  {
    return $this->id;
  }

  /** `Getter` login. */
  public function getLogin(): string
  {
    return $this->login;
  }

  /** `Getter` password. */
  public function getPassword(): string
  {
    return $this->password;
  }

  /** `Getter` type. */
  public function getType(): string
  {
    return $this->type;
  }

  /** `Setter` id. */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /** `Setter` login. */
  public function setLogin(string $login): void
  {
    $this->login = $login;
  }

  /** `Setter` password. */
  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  /** `Setter` type. */
  public function setType(string $type): void
  {
    $this->type = $type;
  }
}
