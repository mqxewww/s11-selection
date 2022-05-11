<?php

namespace Selection\Models;

use PDOException;
use Selection\Errors\DatabaseError;
use Selection\Errors\InvalidInput;
use Selection\Models\Base\Manager;

class AccountManager extends Manager
{
  /**
   * Returns all account table rows in Account classes.
   * @return array
   * @throws DatabaseError
   */
  public function getList(): array
  {
    try {
      $stmt = $this->getDb()->prepare("SELECT * FROM account");
      $stmt->execute();
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) $accounts[] = new Account($row);

    return (isset($accounts)) ? $accounts : array();
  }

  /**
   * Returns a row from the account table into a class Account.
   * @param int $id Account id.
   * @return Account
   * @throws DatabaseError|InvalidInput
   */
  public function getOne(int $id): Account
  {
    try {
      $stmt = $this->getDb()->prepare(
        "SELECT * FROM account
        WHERE id = :id
        LIMIT 1"
      );
      $stmt->execute(["id" => $id]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) $account = new Account($row);

    # Account not found
    if (!isset($account)) throw new InvalidInput("Utilisateur");

    return $account;
  }

  /**
   * Create a new row in the database's account table.
   * @param Account $account New account ($id not required).
   * @return void
   * @throws DatabaseError
   */
  public function createAccount(Account $account): void
  {
    try {
      $stmt = $this->getDb()->prepare(
        "INSERT INTO account(login, password, type)
        VALUES(:log, :pass, :type)"
      );
      $stmt->execute([
        "log" => $account->getLogin(),
        "pass" => password_hash($account->getPassword(), PASSWORD_BCRYPT),
        "type" => $account->getType()
      ]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }
  }

  /**
   * Update an existing row in the database's account table.
   * @param Account $account Account informations.
   * @return void
   * @throws DatabaseError
   */
  public function updateAccount(Account $account): void
  {
    try {
      $stmt = $this->getDb()->prepare(
        "UPDATE account
        SET
          login = :log,
          password = :pass,
          type = :type
        WHERE id = :id"
      );
      $stmt->execute([
        "id" => $account->getId(),
        "log" => $account->getLogin(),
        "pass" => password_hash($account->getPassword(), PASSWORD_BCRYPT),
        "type" => $account->getType()
      ]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }
  }

  /**
   * Delete an existing row in the database's account table.
   * @param int $id Account id.
   * @return void
   * @throws DatabaseError
   */
  public function deleteAccount(int $id): void
  {
    try {
      $stmt = $this->getDb()->prepare(
        "DELETE from account
        WHERE id = :id"
      );
      $stmt->execute(["id" => $id]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }
  }

  /**
   * Log into the application.
   * @param string $log Account login.
   * @param string $pass Account password.
   * @return Account
   * @throws DatabaseError|InvalidInput
   */
  public function logIn(string $log, string $pass): Account
  {
    try {
      $stmt = $this->getDb()->prepare(
        "SELECT * FROM account
          WHERE login = :login"
      );
      $stmt->execute(["login" => $log]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) $account = new Account($row);

    if (
      !isset($account)
      || !password_verify($pass, $account->getPassword())
    ) {
      throw new InvalidInput("Identifiants");
    }

    return $account;
  }

  /**
   * Verify if new user login is available.
   * @param string $login New account login.
   * @return void
   * @throws DatabaseError|InvalidInput
   */
  public function verifyLogin(string $login): void
  {
    try {
      $stmt = $this->getDb()->prepare("SELECT * FROM account");
      $stmt->execute();
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) {
      $account = new Account($row);
      if ($account->getLogin() === $login) throw new InvalidInput("Login");
    }
  }
}
