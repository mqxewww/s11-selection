<?php

/*
* "login" page redirection controller :
* Login to the application
* Create sessions variables if the login is successfull
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

try {
  !empty($_POST["accountLog"])
    ? $log = htmlspecialchars($_POST["accountLog"])
    : throw new Exception("`Identifiant` est requis.");

  !empty($_POST["accountPwd"])
    ? $pass = htmlspecialchars($_POST["accountPwd"])
    : throw new Exception("`Mot de passe` est requis.");

  $account = $manager->logIn($log, $pass);

  $_SESSION["auth"] = $account->getType();
  $_SESSION["user"] = $account->getLogin();
  $_SESSION["timestamp"] = time();
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
} finally {
  header("Location: " . $_SERVER["PHP_SELF"]);
  exit;
}
