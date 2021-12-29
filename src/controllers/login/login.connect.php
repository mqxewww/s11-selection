<?php

/*
* "login" page redirection controller :
* Login to the application
* Create sessions variables if the login is successfull
* Redirect to main router according to result
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

$log = htmlspecialchars($_POST["accountLog"]);
$pass = htmlspecialchars($_POST["accountPwd"]);

try {
  $account = $manager->logIn($log, $pass);

  $_SESSION["auth"] = $account->getType();
  $_SESSION["user"] = $account->getLogin();
  $_SESSION["timestamp"] = time();
} catch (Exception $e) {
  header("Location: ?fail");
  exit;
}

header("Location: /");
exit;
