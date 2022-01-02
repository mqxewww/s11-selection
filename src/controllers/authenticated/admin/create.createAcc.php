<?php

/*
* "create" page redirection controller :
* Create a new account
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

try {
  !empty($_POST["newAccountLog"])
    ? $log = htmlspecialchars($_POST["newAccountLog"])
    : throw new Exception("`Identifiant` est manquant.");

  !empty($_POST["newAccountPwd"])
    ? $pass = htmlspecialchars($_POST["newAccountPwd"])
    : throw new Exception("`Mot de passe` est manquant.");

  !empty($_POST["newAccountPwdConf"])
    ? $passConf = htmlspecialchars($_POST["newAccountPwdConf"])
    : throw new Exception("`Confirmation du mot de passe` est manquant.");

  !empty($_POST["newAccountType"])
    ? $type = htmlspecialchars($_POST["newAccountType"])
    : throw new Exception("`Type de compte` est manquant.");

  $account = new Account([
    "login" => $log,
    "password" => $pass,
    "type" => $type
  ]);

  # If password & verification password are not equal
  if ($passConf !== $account->getPassword()) {
    throw new Exception("Les mots de passe ne correspondent pas.");
  }

  # If login is already taken
  if (!$manager->isLoginAvailable($account->getLogin())) {
    throw new Exception("Ce login est déja utilisé.");
  }

  $manager->createAccount($account);
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: ?create");
  exit;
}

$_SESSION["success"] = "Compte créé avec succès !";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
