<?php

namespace Selection\Models;

use PDOException;
use Selection\Errors\DatabaseError;
use Selection\Errors\InvalidInput;
use Selection\Models\Base\Manager;

class GridManager extends Manager
{
  /**
   * Returns all grid table rows in Grid classes.
   * @return array
   * @throws DatabaseError
   */
  public function getList(): array
  {
    try {
      $stmt = $this->getDb()->prepare("SELECT * FROM grid ORDER BY mark DESC");
      $stmt->execute();
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) $grids[] = new Grid($row);

    return (isset($grids)) ? $grids : array();
  }

  /**
   * Returns a row from the grid table into a class Grid.
   * @param \int $id Grid id.
   * @return Grid
   * @throws DatabaseError|InvalidInput
   */
  public function getOne(int $id): Grid
  {
    try {
      $stmt = $this->getDb()->prepare(
        "SELECT * FROM grid
        WHERE id = :id
        LIMIT 1"
      );
      $stmt->execute(["id" => $id]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) $grid = new Grid($row);

    # Grid not found
    if (!isset($grid)) throw new InvalidInput("Grille");

    return $grid;
  }

  /**
   * Create a new row in the database's grid table.
   * @param Grid $grid New grid ($id not required).
   * @return void
   * @throws DatabaseError
   */
  public function createGrid(Grid $grid): void
  {
    try {
      $stmt = $this->getDb()->prepare(
        "INSERT INTO grid(number, name, firstname, diploma, work, absence, attitude, study, ppview, proview, coverletter, comment, mark)
        VALUES(:num, :name, :firstname, :diploma, :work, :abs, :att, :study, :pp, :pro, :cl, :comment, :mark)"
      );
      $stmt->execute([
        "num" => $grid->getNumber(),
        "name" => $grid->getName(),
        "firstname" => $grid->getFirstname(),
        "diploma" => $grid->getDiploma(),
        "work" => $grid->getWork(),
        "abs" => $grid->getAbsence(),
        "att" => $grid->getAttitude(),
        "study" => $grid->getStudy(),
        "pp" => $grid->getPpview(),
        "pro" => $grid->getProview(),
        "cl" => $grid->getCoverletter(),
        "comment" => $grid->getComment(),
        "mark" => $grid->getMark()
      ]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }
  }

  /**
   * Update an existing row in the database's grid table.
   * @param Grid $grid Grid informations.
   * @return void
   * @throws DatabaseError
   */
  public function updateGrid(Grid $grid): void
  {
    try {
      $stmt = $this->getDb()->prepare(
        "UPDATE grid
        SET
          number = :num,
          name = :name,
          firstname = :firstname,
          diploma = :diploma,
          work = :work,
          absence = :abs,
          attitude = :att,
          study = :study,
          ppview = :pp,
          proview = :pro,
          coverletter = :cl,
          comment = :comment,
          mark = :mark
        WHERE id = :id"
      );
      $stmt->execute([
        "id" => $grid->getId(),
        "num" => $grid->getNumber(),
        "name" => $grid->getName(),
        "firstname" => $grid->getFirstname(),
        "diploma" => $grid->getDiploma(),
        "work" => $grid->getWork(),
        "abs" => $grid->getAbsence(),
        "att" => $grid->getAttitude(),
        "study" => $grid->getStudy(),
        "pp" => $grid->getPpview(),
        "pro" => $grid->getProview(),
        "cl" => $grid->getCoverletter(),
        "comment" => $grid->getComment(),
        "mark" => $grid->getMark()
      ]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }
  }

  /**
   * Delete an existing row in the database's grid table.
   * @param int $id Grid id.
   * @return void
   * @throws DatabaseError
   */
  public function deleteGrid(int $id): void
  {
    try {
      $stmt = $this->getDb()->prepare(
        "DELETE from grid
        WHERE id = :id"
      );
      $stmt->execute(["id" => $id]);
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }
  }

  /**
   * Verify if new grid number is available.
   * @param string $num New grid number.
   * @return void
   * @throws DatabaseError|InvalidInput
   */
  public function verifyNumber(string $num): void
  {
    try {
      $stmt = $this->getDb()->prepare("SELECT * FROM grid");
      $stmt->execute();
    } catch (PDOException $e) {
      throw new DatabaseError($e->getMessage());
    }

    foreach ($stmt as $row) {
      $grid = new Grid($row);
      if ($grid->getNumber() === $num) throw new InvalidInput("Numéro");
    }
  }
}
