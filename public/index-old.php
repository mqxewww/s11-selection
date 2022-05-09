<?php

/**
 * MIT License
 * Copyright (c) 2022 NOIZET Maxence

 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
session_start();

define("ROOT_URL", dirname(__DIR__));
define("BASE_VIEW_PATH", dirname(__DIR__) . "/src/views/");

try {
  require_once dirname(__DIR__) . "/config/config.php";
  require_once dirname(__DIR__) . "/config/connect.php";

  require_once dirname(__DIR__) . "/vendor/autoload.php";

  # User logout
  if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
  }

  //-----------------------------------------------------
  // Authenticated user
  //-----------------------------------------------------

  if (
    isset($_SESSION["auth"]) && !empty($_SESSION["auth"])
    && isset($_SESSION["timestamp"]) && !empty($_SESSION["timestamp"])
  ) {

    # Expired session
    if (time() - $_SESSION["timestamp"] > 1200) {
      session_unset();
      $_SESSION["error"] = "Erreur : Vous avez été déconnecté pour inactivité. (+ de 20 minutes)";
      header("Location: /");
      exit;
    }

    $_SESSION["timestamp"] = time();
    $url = dirname(__DIR__) . "/src/controllers/authenticated/" . $_SESSION["auth"] . "/";

    /**
     * How the controller selection works :
     * Each case corresponds to a user type
     * Then the list of created pages
     * Finally, either execute the page's form or simply call the page
     * <!> Each controller has an exit tag, so only one controller will be called <!>
     */
    switch ($_SESSION["auth"]) {

      case "admin": # user type: admin
        ## create page
        if (isset($_GET["create"])) {
          if (isset($_POST["createAcc"])) require_once $url . "create.createAcc.php";

          require_once $url . "create.page.php";
        }

        ## update page
        if (isset($_GET["update"])) {
          if (isset($_POST["updateAcc"])) require_once $url . "update.updateAcc.php";

          require_once $url . "update.page.php";
        }

        ## delete page
        if (isset($_GET["delete"])) {
          if (isset($_POST["deleteAcc"])) require_once $url . "delete.deleteAcc.php";

          require_once $url . "delete.page.php";
        }

        ## home page
        require_once $url . "home.page.php";

      case "secretary": # user type: secretary
        ## download page
        if (isset($_GET["download"])) {
          require_once $url . "download.page.php";
        }

        ## home page
        require_once $url . "home.page.php";

      case "teacher": # user type: teacher
        ## create page
        if (isset($_GET["create"])) {
          if (isset($_POST["createGrid"])) require_once $url . "create.createGrid.php";

          require_once $url . "create.page.php";
        }

        ## update page
        if (isset($_GET["update"])) {
          if (isset($_POST["updateGrid"])) require_once $url . "update.updateGrid.php";

          require_once $url . "update.page.php";
        }

        ## delete page
        if (isset($_GET["delete"])) {
          if (isset($_POST["deleteGrid"])) require_once $url . "delete.deleteGrid.php";

          require_once $url . "delete.page.php";
        }

        ## home page
        require_once $url . "home.page.php";
    }
  }

  //-----------------------------------------------------
  // Unauthenticated user
  //-----------------------------------------------------

  $url = dirname(__DIR__) . "/src/controllers/unauthenticated/";

  ## home page
  if (isset($_POST["appLogin"])) require_once $url . "login.appLogin.php";

  require_once $url . "login.page.php";
} catch (Exception $e) {
  die($e->getMessage());
}
