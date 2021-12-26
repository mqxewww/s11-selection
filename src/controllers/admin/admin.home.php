<?php

/*
* "home" page controller :
* Retrieves all accounts and displays them in the view
*/

require_once "./src/models/Account.php";
require_once "./src/models/AccountManager.php";
$manager = new AccountManager($database);

$list = $manager->getList();

// View
require_once "./src/views/admin/adminHome.php";
