<?php

/*
* "delete" page redirection controller :
* Delete an account
* Redirect to main router according to result
*/
sleep(1);

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

try {
  !empty($_POST["delAccountId"])
    ? $id = htmlspecialchars($_POST["delAccountId"])
    : throw new Exception("L'Id grille n'est pas valide.");

  $manager->deleteAccount(intval($id));
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: ?delete&accountId=" . $_GET["accountId"]);
  exit;
}

$_SESSION["success"] = "Compte supprimé !";
header("Location: " . $_SERVER["PHP_SELF"]);
exit;
