<?php

/*
* "update" page redirection controller :
* Update an account
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

try {
  !empty($_GET["accountId"])
    ? $id = htmlspecialchars($_GET["accountId"])
    : throw new Exception();

  !empty($_POST["oldAccountLog"])
    ? $oldLog = htmlspecialchars($_POST["oldAccountLog"])
    : throw new Exception("`Identifiant` est manquant.");

  !empty($_POST["modAccountLog"])
    ? $log = htmlspecialchars($_POST["modAccountLog"])
    : throw new Exception("`Identifiant` est manquant.");

  !empty($_POST["modAccountPwd"])
    ? $pass = htmlspecialchars($_POST["modAccountPwd"])
    : throw new Exception("`Mot de passe` est manquant.");

  !empty($_POST["modAccountPwdConf"])
    ? $passConf = htmlspecialchars($_POST["modAccountPwdConf"])
    : throw new Exception("`Confirmation du mot de passe` est manquant.");

  !empty($_POST["modAccountType"])
    ? $type = htmlspecialchars($_POST["modAccountType"])
    : throw new Exception("`Type de compte` est manquant.");

  $account = new Account([
    "id" => intval($id),
    "login" => $log,
    "password" => $pass,
    "type" => $type
  ]);

  # If password & verification password are not equal
  if ($passConf !== $account->getPassword()) {
    throw new Exception("Les mots de passe ne correspondent pas.");
  }

  # If login is different & is already taken
  if ($account->getLogin() !== $oldLog && !$manager->isLoginAvailable($account->getLogin())) {
    throw new Exception("Ce login est déja utilisé.");
  }

  $manager->updateAccount($account);
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: ?update&accountId=" . $_GET["accountId"]);
  exit;
}

$_SESSION["success"] = "Compte mis à jour !";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
