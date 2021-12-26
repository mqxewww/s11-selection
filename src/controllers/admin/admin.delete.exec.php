<?php

/*
* "delete" page redirection controller :
* Delete an account
* Redirect to main router according to result
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

$id = htmlspecialchars($_POST["delAccountId"]);

try {
  $manager->deleteAccount(intval($id));
} catch (Exception $e) {
  header("Location: ?delete&accountId=" . $_GET["accountId"] . "&failed");
  exit;
}

header("Location: ?deleted");
exit;
