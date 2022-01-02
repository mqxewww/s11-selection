<?php

//======================================================================
// ACCOUNT MANAGER CLASS
//======================================================================

class AccountManager
{
  protected $database;

  public function __construct(PDO $db)
  {
    $this->database = $db;
  }

  /**
   * Selects all rows of the database's account table and creates an Account for each.
   * End by returning the created Account array.
   * @return \Account[]
   */
  public function getList()
  {
    $stmt = $this->database->prepare("SELECT * FROM account");
    $stmt->execute();

    foreach ($stmt as $row) $accounts[] = new Account($row);

    return (isset($accounts))
      ? $accounts
      : array();
  }

  /**
   * Selects one row of the database's account table and creates an Account.
   * End by returning the created Account.
   * @param int $id Account id
   * @return \Account
   */
  public function getOne(int $id)
  {
    $stmt = $this->database->prepare(
      "SELECT * FROM account
      WHERE id = :id
      LIMIT 1"
    );
    $stmt->execute(["id" => $id]);

    foreach ($stmt as $row) $account = new Account($row);

    # Account not found
    if (!isset($account)) throw new Exception("Le compte est introuvable.");

    return $account;
  }

  /**
   * Create a new row in the database's account table.
   * @param Account $account New account ($id not required)
   */
  public function createAccount(Account $account)
  {
    $stmt = $this->database->prepare(
      "INSERT INTO account(login, password, type)
      VALUES(:log, :pass, :type)"
    );
    $stmt->execute([
      "log" => $account->getLogin(),
      "pass" => password_hash($account->getPassword(), PASSWORD_BCRYPT),
      "type" => $account->getType()
    ]);
  }

  /**
   * Update an existing row in the database's account table.
   * @param Account $account Account informations
   */
  public function updateAccount(Account $account)
  {
    $stmt = $this->database->prepare(
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
  }

  /**
   * Delete an existing row in the database's account table.
   * @param int $id Account id
   */
  public function deleteAccount(int $id)
  {
    $stmt = $this->database->prepare(
      "DELETE from account
      WHERE id = :id"
    );
    $stmt->execute(["id" => $id]);
  }

  /**
   * Log into the application.
   * @param string $log Account login
   * @param string $pass Account password
   * @return \Account
   */
  public function logIn(string $log, string $pass)
  {
    $stmt = $this->database->prepare(
      "SELECT * FROM account
        WHERE login = :login"
    );
    $stmt->execute(["login" => $log]);

    foreach ($stmt as $row) $account = new Account($row);

    if (!isset($account)) throw new Exception("Le login est incorrect.");

    if (!password_verify($pass, $account->getPassword())) throw new Exception("Le mot de passe est incorrect.");

    return $account;
  }

  /**
   * Verify if new user login is available
   * @param string $log New account login
   * @return true|false
   */
  public function isLoginAvailable(string $log)
  {
    $stmt = $this->database->prepare("SELECT * FROM account");
    $stmt->execute();

    foreach ($stmt as $row) {
      $account = new Account($row);
      if ($account->getLogin() === $log) return false;
    }

    return true;
  }
}
