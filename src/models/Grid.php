<?php

namespace Selection\Models;

class Grid
{
  protected int $id;
  protected string $number;
  protected string $name;
  protected string $firstname;
  protected int $diploma;
  protected int $work;
  protected int $absence;
  protected int $attitude;
  protected int $study;
  protected int $ppview;
  protected int $proview;
  protected int $coverletter;
  protected string $comment;
  protected int $mark;

  public function __construct(array $data)
  {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) $this->$method($value);
    }
  }

  /** `Getter` id. */
  public function getId(): int
  {
    return $this->id;
  }

  /** `Getter` number. */
  public function getNumber(): string
  {
    return $this->number;
  }

  /** `Getter` name. */
  public function getName(): string
  {
    return $this->name;
  }

  /** `Getter` firstname. */
  public function getFirstname(): string
  {
    return $this->firstname;
  }

  /** `Getter` diploma. */
  public function getDiploma(): int
  {
    return $this->diploma;
  }

  /** `Getter` work. */
  public function getWork(): int
  {
    return $this->work;
  }

  /** `Getter` absence. */
  public function getAbsence(): int
  {
    return $this->absence;
  }

  /** `Getter` attitude. */
  public function getAttitude(): int
  {
    return $this->attitude;
  }

  /** `Getter` study. */
  public function getStudy(): int
  {
    return $this->study;
  }

  /** `Getter` ppview. */
  public function getPpview(): int
  {
    return $this->ppview;
  }

  /** `Getter` proview. */
  public function getProview(): int
  {
    return $this->proview;
  }

  /** `Getter` coverletter. */
  public function getCoverletter(): int
  {
    return $this->coverletter;
  }

  /** `Getter` comment. */
  public function getComment(): string
  {
    return $this->comment;
  }

  /** `Getter` mark. */
  public function getMark(): int
  {
    return $this->mark;
  }

  /** `Setter` id. */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /** `Setter` number. */
  public function setNumber(string $number): void
  {
    $this->number = $number;
  }

  /** `Setter` name. */
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  /** `Setter` firstname. */
  public function setFirstname(string $firstname): void
  {
    $this->firstname = $firstname;
  }

  /** `Setter` diploma. */
  public function setDiploma(int $diploma): void
  {
    $this->diploma = $diploma;
  }

  /** `Setter` work. */
  public function setWork(int $work): void
  {
    $this->work = $work;
  }

  /** `Setter` absence. */
  public function setAbsence(int $absence): void
  {
    $this->absence = $absence;
  }

  /** `Setter` attitude. */
  public function setAttitude(int $attitude): void
  {
    $this->attitude = $attitude;
  }

  /** `Setter` study. */
  public function setStudy(int $study): void
  {
    $this->study = $study;
  }

  /** `Setter` ppview. */
  public function setPpview(int $ppview): void
  {
    $this->ppview = $ppview;
  }

  /** `Setter` proview. */
  public function setProview(int $proview): void
  {
    $this->proview = $proview;
  }

  /** `Setter` coverletter. */
  public function setCoverletter(int $coverletter): void
  {
    $this->coverletter = $coverletter;
  }

  /** `Setter` comment. */
  public function setComment(string $comment): void
  {
    $this->comment = $comment;
  }

  /** `Setter` mark. */
  public function setMark(int $mark): void
  {
    $this->mark = $mark;
  }
}
