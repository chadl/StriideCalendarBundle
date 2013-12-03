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
      
      if($event->hasDescription() )
      {
        $e->setProperty( 'comment', $event->getDescription() );
      }
      
      $e->setProperty( 'location', $event->getLocation() );
      $e->setProperty( 'dtstart', $event->getStartTime()->format("Ymd\THis ") . $event->getStartTime()->getTimezone()->getName() );
      $e->setProperty( 'dtend', $event->getEndTime()->format("Ymd\THis ") . $event->getEndTime()->getTimezone()->getName() );

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

  public function calendarToIcs(Calendar $c)
  {
    // 1. Create new calendar
    $vCalendar = new \Striide\CalendarBundle\Bridge\Calendar($c->getGuid());


    $vCalendar->setName($c->getName());
    $vCalendar->setDescription($c->getDescription());
    $vCalendar->setTimezone($c->getTimezone());
    $vCalendar->buildPropertyBag();
    
    $parts = $c->getParts();
    if(!empty($parts))
    {
      foreach($parts as $id => $part)
      {
        $vCalendar->addPart($id, $part['type'], $part['content']);
      }
    }
    
    // 2. Create an event
    // check if daylight or standard time....
    foreach($c->getEvents() as $event)
    {
      $vEvent = new \Striide\CalendarBundle\Bridge\Event();
      $vEvent->setDtStart($event->getStartTime());
      $vEvent->setDtEnd($event->getEndTime());
      //$vEvent->setNoTime(true);
      $vEvent->setSummary($event->getName());
      $vEvent->setLocation($event->getLocation());
      
      if($event->hasDescription() )
      {
        if($event->hasCustomDescription())
        {
          $vEvent->setCustomDescription( $event->getCustomDescription(), $event->getDescription() );
        }
        else
        {
          $vEvent->setDescription( $event->getDescription() ); 
        }
      }
      
      if($event->hasUrl() )
      {
        $vEvent->setUrl( $event->getUrl() );
      }

      // Adding Timezone (optional)
      $vEvent->setUseTimezone(true);

      // 3. Add event to calendar
      $vCalendar->addEvent($vEvent);
    }
    return $vCalendar;
  }
}
