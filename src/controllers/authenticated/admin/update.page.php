<?php

/*
* "update" page controller :
* Retrieves account information to be modified and displays it in the view
* Redirects to home page in case of a loading error
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

try {
  !empty($_GET["accountId"])
    ? $id = htmlspecialchars($_GET["accountId"])
    : throw new Exception("L'Id utilisateur de l'URL n'est pas valide.");

  $account = $manager->getOne(intval($id));
} catch (Exception $e) {
  $_SESSION["error"] = "Erreur : " . $e->getMessage();
  header("Location: " . $_SERVER["PHP_SELF"]);
  exit;
}

// Display the view
require_once "./src/views/pages/admin/adminUpdate.php";

# If an error message was set
if (isset($_SESSION["error"])) unset($_SESSION["error"]);

exit;
