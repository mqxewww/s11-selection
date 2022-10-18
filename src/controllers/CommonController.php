<?php

namespace Selection\Controllers;

use Selection\Errors\DatabaseError;
use Selection\Errors\InvalidInput;
use Selection\Errors\NonMatchingPasswords;
use Selection\Libs\App;
use Selection\Models\Account;
use Selection\Models\AccountManager;

class CommonController
{
  private static AccountManager $accountManager;

  public function __construct()
  {
    $this::$accountManager = new AccountManager();
  }

  /**
   * `View Display` Common > change-password.
   */
  public function changePassword(): void
  {
    try {
      $id = App::getFilter("accountId", "URL");

      $account = $this::$accountManager->getOne(intval($id));

      # Make sure that the user can only modify his account.
      if ($account->getId() !== $_SESSION["id"]) App::redirect("");
    } catch (DatabaseError | InvalidInput $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("");
    }

    require_once BASE_VIEW_PATH . "/common/change-password.php";

    App::clearView();
  }

  /**
   * `Backend Call` Account password reset.
   */
  public function updateAccountPassword(): void
  {
    try {
      $id = App::getFilter("accountId", "URL");
      $oldPwd = App::postFilter("oldAccountPwd", "Ancien mot de passe");
      $newPwd = App::postFilter("newAccountPwd", "Nouveau mot de passe");
      $newPwdConf = App::postFilter("newAccountPwdConf", "Confirmation du nouveau mot de passe");

      $account = new Account([
        "id" => intval($id),
        "password" => $newPwd,
      ]);

      # If the old password entered is incorrect.
      if (!password_verify($oldPwd, $this::$accountManager->getOne($account->getId())->getPassword())) {
        throw new InvalidInput("Ancien mot de passe");
      }

      # If password & verification password are not equal.
      if ($newPwdConf !== $account->getPassword()) throw new NonMatchingPasswords();

      $this::$accountManager->resetAccountPassword($account);
    } catch (InvalidInput | NonMatchingPasswords | DatabaseError $e) {
      $_SESSION["error"] = $e->getMessage();
      App::redirect("common/change-password?accountId=" . $_GET["accountId"]);
    }

    $_SESSION["success"] = "Mot de passe du compte modifié !";
    App::redirect("");
  }
}
