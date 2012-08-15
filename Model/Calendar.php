<?php
namespace Striide\CalendarBundle\Model;

class Calendar
{
  protected $guid = null;
  public function setGuid($g)
  {
    $this->guid = $g;
  }
  public function getGuid()
  {
    return $this->guid;
  }

  /**
   * @var DateTimeZone
   */
  protected $timezone = null;
  public function getTimezone()
  {
    if(is_null($this->timezone))
    {
      $this->timezone = new \DateTimeZone('US/Pacific');
    }
    return $this->timezone;
  }
  public function setTimezone(\DateTimeZone $t)
  {
    $this->timezone = $t;
  }

  /**
   * @var string
   */
  protected $name = "";
  public function getName()
  {
    return $this->name;
  }
  public function setName($n)
  {
    $this->name = $n;
  }

  /**
   * @var string
   */
  protected $description = "";
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($d)
  {
    $this->description = $d;
  }

  /**
   * array(Event)
   */
  protected $events = array();
  public function addEvent(Event $e)
  {
    $this->events[] = $e;
  }
  public function getEvents()
  {
    return $this->events;
  }
}
