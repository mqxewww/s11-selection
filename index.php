<?php

//======================================================================
// APPLICATION STARTING POINT
//======================================================================

session_start();

try {
  require_once "./config/config.php";
  require_once "./config/connect.php";

  # User logout
  if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: ?");
    exit;
  }

  //-----------------------------------------------------
  // Identified user
  //-----------------------------------------------------

  if (isset($_SESSION["auth"]) && isset($_SESSION["timestamp"])) {

    # Expired session
    if (time() - $_SESSION["timestamp"] > 1200) {
      session_destroy();
      header("Location: " . "?afk");
      exit;
    }

    $_SESSION["timestamp"] = time();
    $url = "./src/controllers/" . $_SESSION["auth"] . "/" . $_SESSION["auth"] . ".";

    /*
    * Depending on the URL values ($_GET and $_POST)
    * Look at which controller should be called
    * Only one controller will be called
    */
    switch ($_SESSION["auth"]) {

      case "admin": # User is an administrator
        if (isset($_GET["create"])) {
          isset($_POST["newAccountLog"])
            ? require_once $url . "create.exec.php"
            : require_once $url . "create.load.php";
          exit;
        }

        if (isset($_GET["update"])) {
          isset($_POST["modAccountLog"])
            ? require_once $url . "update.exec.php"
            : require_once $url . "update.load.php";
          exit;
        }

        if (isset($_GET["delete"])) {
          isset($_POST["delAccountId"])
            ? require_once $url . "delete.exec.php"
            : require_once $url . "delete.load.php";
          exit;
        }

        # Default
        require_once $url . "home.php";
        exit;

      case "secretary": # User is a secretary
        isset($_GET["download"])
          ? require_once $url . "download.php"
          : require_once $url . "home.php";
        exit;

      case "teacher": # User is a teacher
        if (isset($_GET["create"])) {
          isset($_POST["newGridNum"])
            ? require_once $url . "create.exec.php"
            : require_once $url . "create.load.php";
          exit;
        }

        if (isset($_GET["update"])) {
          isset($_POST["modGridNum"])
            ? require_once $url . "update.exec.php"
            : require_once $url . "update.load.php";
          exit;
        }

        if (isset($_GET["delete"])) {
          isset($_POST["delGridId"])
            ? require_once $url . "delete.exec.php"
            : require_once $url . "delete.load.php";
          exit;
        }

        # Default
        require_once $url . "home.php";
        exit;
    }
  }

  //-----------------------------------------------------
  // Unidentified user
  //-----------------------------------------------------

  $url = "./src/controllers/login/login.";

  isset($_POST["accountLog"])
    ? require_once $url . "connect.php"
    : require_once $url . "home.php";
} catch (Exception $e) {
  die("Error : " . $e->getMessage());
}
