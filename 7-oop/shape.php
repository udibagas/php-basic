<?php

interface IShape
{
  public function getArea();

  public function getCircumference();
}

trait ShapeTrait
{
  public $area;
  public $circumference;
}


abstract class Shape implements IShape
{
  use ShapeTrait;

  public function getArea()
  {
    throw new Exception("Not imlplemented");
  }

  public function getCircumference()
  {
    throw new Exception("Not imlplemented");
  }
}

class Circle extends Shape
{
  public $radius;

  public function getArea()
  {
    return pi() * $this->radius * $this->radius;
  }

  public function getCircumference()
  {
    return pi() * $this->radius * 2;
  }
}

class Square extends Shape
{
  public $side;

  public function getArea()
  {
    return $this->side * $this->side;
  }

  public function getCircumference()
  {
    return $this->side * 4;
  }
}

class Triangle extends Shape
{
  public $alas;
  public $height;

  public function getArea()
  {
    return $this->alas * $this->height * 0.5;
  }

  public function getCircumference()
  {
    return $this->alas * 3;
  }
}
