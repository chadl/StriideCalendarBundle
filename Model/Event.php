<?php
namespace Striide\CalendarBundle\Model;

class Event
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
  
  protected $description = "";
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($d)
  {
    $this->description = $d;
    return $this;
  }
  /**
   * @return book
   */
  public function hasDescription()
  {
    if(empty($this->description))
    {
      return false;
    }
    return true;
  }

  protected $location = "";
  public function getLocation()
  {
    return $this->location;
  }
  public function setLocation($l)
  {
    $this->location = $l;
    return $this;
  }

  /**
   * @var DateTime
   */
  protected $starttime = null;
  public function getStarttime()
  {
    return $this->starttime;
  }
  public function setStarttime(\DateTime $s)
  {
    $this->starttime = $s;
    return $this;
  }

  /**
   * @var DateTime
   */
  protected $endtime = null;
  public function getEndtime()
  {
    return $this->endtime;
  }
  public function setEndtime(\DateTime $s)
  {
    $this->endtime = $s;
    return $this;
  }

  /**
   * @var DateTimeZone
   */
  protected $timezone = null;
  public function getTimezone()
  {
    // in the event we need to return a default
    if(is_null($this->timezone))
    {
      $this->timezone = new \DateTimeZone('US/Pacific');
    }
    return $this->timezone;
  }

  public function getTimezoneAbbreviation()
  {
    return 'PST';
  }

  /**
   * @param string $d 3h 3.5h etc
   */
  public function setDuration($d)
  {
    $this->duration = $d;
    return $this;
  }

  /**
   * @var array(Alarm)
   */
  protected $alarms = array();
  public function addAlarm(Alarm $a)
  {
    $this->alarms[] = $a;
    return $this;
  }
  public function getAlarms()
  {
    return $this->alarms;
  }
}
