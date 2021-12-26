<?php

/*
* "delete" page controller :
* Retrieves account information to be deleted and displays it in the view
* Redirects to home page in case of a loading error
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

try {

  # Undefined account id
  if (!isset($_GET["accountId"])) throw new Exception();

  $id = htmlspecialchars($_GET["accountId"]);

  $account = $manager->getOne(intval($id));
} catch (Exception $e) {
  header("Location: ?");
  exit;
}

// View
require_once "./src/views/admin/adminDelete.php";
