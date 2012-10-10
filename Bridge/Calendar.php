<?php
namespace Striide\CalendarBundle\Bridge;

class Calendar extends \Eluceo\iCal\Component\Calendar
{
  protected $name;
  public function setName($name)
  {
    $this->name = $name;
  }
  protected $description;
  public function setDescription($description)
  {
    $this->description = $description;
  }
  protected $tz;
  public function setTimezone($timezone)
  {
    $this->tz = $timezone;
  }

  public function buildPropertyBag()
  {
    parent::buildPropertyBag();
    $this->properties->set("x-WR-CALNAME",$this->name);
    $this->properties->set("X-WR-CALDESC",$this->description);
    $this->properties->set("X-WR-TIMEZONE", $this->tz->getName() );
  }

}
