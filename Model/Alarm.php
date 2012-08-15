<?php
namespace Striide\CalendarBundle\Model;

class Alarm
{
  protected $name = "";
  public function getName()
  {
    return $this->name;
  }
  public function setName($n)
  {
    $this->name = $n;
  }

  protected $when = "";
  public function getWhen()
  {
    return $this->when;
  }
  /**
   * @param $w when 1week|2day|4hour
   */
  public function setWhen($n)
  {
    $this->when = $w;
  }
  public function getWhenUnit()
  {
    // TODO: incomplete
    //5,6,7
    return 2;
  }
  public function getWhenType()
  {
    // TODO: incomplete
    //hour/week/day
    return 'hour';
  }
}
