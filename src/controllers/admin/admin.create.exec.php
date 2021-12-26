<?php

/*
* "create" page redirection controller :
* Create a new account
* Redirect to main router according to result
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

$log = htmlspecialchars($_POST["newAccountLog"]);
$pass = htmlspecialchars($_POST["newAccountPwd"]);
$passConf = htmlspecialchars($_POST["newAccountPwdConf"]);
$type = htmlspecialchars($_POST["newAccountType"]);

$account = new Account([
  "login" => $log,
  "password" => $pass,
  "type" => $type
]);

try {

  # If password & verification password are not equal
  if ($passConf !== $account->getPassword()) throw new Exception();

  $manager->createAccount($account);
} catch (Exception $e) {
  header("Location: ?create&failed");
  exit;
}

header("Location: ?created");
exit;
