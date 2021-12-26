<?php

/*
* "update" page redirection controller :
* Update an account
* Redirect to main router according to result
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

$id = htmlspecialchars($_GET["accountId"]);
$log = htmlspecialchars($_POST["modAccountLog"]);
$pass = htmlspecialchars($_POST["modAccountPwd"]);
$passConf = htmlspecialchars($_POST["modAccountPwdConf"]);
$type = htmlspecialchars($_POST["modAccountType"]);

$account = new Account([
  "id" => intval($id),
  "login" => $log,
  "password" => $pass,
  "type" => $type
]);

try {

  # If password & verification password are not equal
  if ($passConf !== $account->getPassword()) throw new Exception();

  $manager->updateAccount($account);
} catch (Exception $e) {
  header("Location: ?update&accountId=" . $_GET["accountId"] . "&failed");
  exit;
}

header("Location: ?modified");
exit;
