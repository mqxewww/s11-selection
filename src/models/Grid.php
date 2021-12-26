<?php

//======================================================================
// GRID CLASS
//======================================================================

class Grid
{
  protected $id;
  protected $number;
  protected $name;
  protected $firstname;
  protected $diploma;
  protected $work;
  protected $absence;
  protected $attitude;
  protected $study;
  protected $ppview;
  protected $proview;
  protected $coverletter;
  protected $comment;
  protected $mark;

  public function __construct(array $data)
  {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) $this->$method($value);
    }
  }

  //-----------------------------------------------------
  // Getters
  //-----------------------------------------------------

  public function getId()
  {
    return $this->id;
  }

  public function getNumber()
  {
    return $this->number;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getFirstname()
  {
    return $this->firstname;
  }

  public function getDiploma()
  {
    return $this->diploma;
  }

  public function getWork()
  {
    return $this->work;
  }

  public function getAbsence()
  {
    return $this->absence;
  }

  public function getAttitude()
  {
    return $this->attitude;
  }

  public function getStudy()
  {
    return $this->study;
  }

  public function getPpview()
  {
    return $this->ppview;
  }

  public function getProview()
  {
    return $this->proview;
  }

  public function getCoverletter()
  {
    return $this->coverletter;
  }

  public function getComment()
  {
    return $this->comment;
  }

  public function getMark()
  {
    return $this->mark;
  }

  //-----------------------------------------------------
  // Setters
  //-----------------------------------------------------

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setNumber(string $number)
  {
    $this->number = $number;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function setFirstname(string $firstname)
  {
    $this->firstname = $firstname;
  }

  public function setDiploma(int $diploma)
  {
    $this->diploma = $diploma;
  }

  public function setWork(int $work)
  {
    $this->work = $work;
  }

  public function setAbsence(int $absence)
  {
    $this->absence = $absence;
  }

  public function setAttitude(int $attitude)
  {
    $this->attitude = $attitude;
  }

  public function setStudy(int $study)
  {
    $this->study = $study;
  }

  public function setPpview(int $ppview)
  {
    $this->ppview = $ppview;
  }

  public function setProview(int $proview)
  {
    $this->proview = $proview;
  }

  public function setCoverletter(int $coverletter)
  {
    $this->coverletter = $coverletter;
  }

  public function setComment(string $comment)
  {
    $this->comment = $comment;
  }

  public function setMark(int $mark)
  {
    $this->mark = $mark;
  }
}
