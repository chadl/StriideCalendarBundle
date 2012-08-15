<?php
namespace Striide\CalendarBundle\Service;

use Striide\CalendarBundle\Model\Alarm;
use Striide\CalendarBundle\Model\Event;
use Striide\CalendarBundle\Model\Calendar;

class IcsService
{
  public function transformCalendarToICS(Calendar $c)
  {
    $now = new \DateTime();
    $now->format("Y");
    $v = new \vcalendar( array( 'unique_id' => $c->getGuid() ));
    $v->setProperty( "x-wr-calname", $c->getName() );
    $v->setProperty( "X-WR-CALDESC", $c->getDescription() );
    $v->setProperty( "X-WR-TIMEZONE", $c->getTimezone()->getName() );


    // check if daylight or standard time....
    foreach($c->getEvents() as $event)
    {
      $e = & $v->newComponent( 'vevent' );

      $e->setProperty( 'summary', $event->getName() );    // describe the event
      $e->setProperty( 'location', $event->getLocation() );
      $e->setProperty( 'dtstart', $event->getStartTime()->format("Ymd\THis ") . $event->getStartTime()->getOffset() );
      $e->setProperty( 'dtend', $event->getEndTime()->format("Ymd\THis ") . $event->getEndTime()->getOffset());

      foreach($event->getAlarms() as $alarm)
      {
        $a = & $e->newComponent( 'valarm' );           // initiate ALARM
        $a->setProperty( 'action', 'DISPLAY' );                  // set what to do
        $a->setProperty( 'description', $a->getName() );          // describe alarm
        $a->setProperty( 'trigger', array( $a->getWhenType() => $a->getWhenUnit() ));        // set trigger one week before
      }
    }
    return $v;
  }
}
