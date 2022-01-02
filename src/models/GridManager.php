<?php

//======================================================================
// GRID MANAGER CLASS
//======================================================================

class GridManager
{
  protected $database;

  public function __construct(PDO $db)
  {
    $this->database = $db;
  }

  /**
   * Selects all rows of the database's grid table and creates a Grid for each.
   * End by returning the created Grid array.
   * @return \Grid[]
   */
  public function getList()
  {
    $stmt = $this->database->prepare("SELECT * FROM grid ORDER BY mark DESC");
    $stmt->execute();

    foreach ($stmt as $row) $grids[] = new Grid($row);

    return (isset($grids))
      ? $grids
      : array();
  }

  /**
   * Selects one row of the database's grid table and creates an Grid.
   * End by returning the created Grid.
   * @param int $id Grid id
   * @return \Grid
   */
  public function getOne(int $id)
  {
    $stmt = $this->database->prepare(
      "SELECT * FROM grid
      WHERE id = :id
      LIMIT 1"
    );
    $stmt->execute(["id" => $id]);

    foreach ($stmt as $row) $grid = new Grid($row);

    # Grid not found
    if (!isset($grid)) throw new Exception();

    return $grid;
  }

  /**
   * Create a new row in the database's grid table.
   * @param Grid $grid New grid ($id not required)
   */
  public function createGrid(Grid $grid)
  {
    $stmt = $this->database->prepare(
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
  }

  /**
   * Update an existing row in the database's grid table.
   * @param Grid $grid Grid informations
   */
  public function updateGrid(Grid $grid)
  {
    $stmt = $this->database->prepare(
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
  }

  /**
   * Delete an existing row in the database's grid table.
   * @param int $id Grid id
   */
  public function deleteGrid(int $id)
  {
    $stmt = $this->database->prepare(
      "DELETE from grid
      WHERE id = :id"
    );
    $stmt->execute(["id" => $id]);
  }

  /**
   * Verify if new grid number is available
   * @param string $num New grid number
   * @return true|false
   */
  public function isNumberAvailable(string $num)
  {
    $stmt = $this->database->prepare("SELECT * FROM grid");
    $stmt->execute();

    foreach ($stmt as $row) {
      $grid = new Grid($row);
      if ($grid->getNumber() === $num) return false;
    }

    return true;
  }
}
