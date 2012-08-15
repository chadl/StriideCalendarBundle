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

  protected $location = "";
  public function getLocation()
  {
    return $this->location;
  }
  public function setLocation($l)
  {
    $this->location = $l;
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
  }

  /**
   * @var array(Alarm)
   */
  protected $alarms = array();
  public function addAlarm(Alarm $a)
  {
    $this->alarms[] = $a;
  }
  public function getAlarms()
  {
    return $this->alarms;
  }
}
