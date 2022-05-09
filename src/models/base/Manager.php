<?php

namespace Selection\Models\Base;

use PDO;
use PDOException;

class Manager
{
  private static PDO $db;

  public function __construct()
  {
    try {
      static::$db = new PDO(
        "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"] . ";charset=utf8",
        $_ENV["DB_USER"],
        $_ENV["DB_PWD"],
        [
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
      );
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  /** `Getter` db. */
  protected function getDb(): PDO
  {
    return static::$db;
  }
}
