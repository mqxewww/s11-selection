<?php

/*
* "create" page controller :
* Simply call the view
*/

// Display the view
require_once "./src/views/pages/admin/adminCreate.php";

# If an error message was set
if (isset($_SESSION["error"])) unset($_SESSION["error"]);

exit;
