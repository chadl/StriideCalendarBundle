<?php
namespace Striide\CalendarBundle\Service;
require_once( 'iCalcreator.class.php' );

class IcsService
{
  public function createCalendar()
  {
  }

  public function createEvent()
  {

  }

  public function createAlarm()
  {

  }
}

// create Event, Alarm, Calendar models
// create EventFactory, AlarmFactory, CalendarFactory etc


  /*

    $config = array( 'unique_id' => 'kigkonsult.se' );
      // set a (site) unique id
    $v = new vcalendar( $config );
      // create a new calendar instance
    $tz = "Europe/Stockholm";
      // define time zone
    .. .
    $v->setProperty( 'method', 'PUBLISH' );
      // required of some calendar software
    $v->setProperty( "x-wr-calname", "Calendar Sample" );
      // required of some calendar software
    $v->setProperty( "X-WR-CALDESC", "Calendar Description" );
      // required of some calendar software
    $v->setProperty( "X-WR-TIMEZONE", $tz );
      // required of some calendar software
    .. .
    $xprops = array( "X-LIC-LOCATION" => $tz );
      // required of some calendar software
    iCalUtilityFunctions::createTimezone( $v, $tz, $xprops );
      // create timezone component(-s) opt. 1
      // based on present date
    .. .
    $vevent = & $v->newComponent( 'vevent' );
      // create an event calendar component
    $start = array( 'year'=>2007, 'month'=>4, 'day'=>1, 'hour'=>19, 'min'=>0, 'sec'=>0 );
    $vevent->setProperty( 'dtstart', $start );
    $end = array( 'year'=>2007, 'month'=>4, 'day'=>1, 'hour'=>22, 'min'=>30, 'sec'=>0 );
    $vevent->setProperty( 'dtend', $end );
    $vevent->setProperty( 'LOCATION', 'Central Placa' );
      // property name - case independent
    $vevent->setProperty( 'summary', 'PHP summit' );
    $vevent->setProperty( 'description', 'This is a description' );
    $vevent->setProperty( 'comment', 'This is a comment' );
    $vevent->setProperty( 'attendee', 'attendee1@icaldomain.net' );
    .. .
    $valarm = & $vevent->newComponent( "valarm" );
      // create an event alarm
    $valarm->setProperty("action", "DISPLAY" );
    $valarm->setProperty("description", $vevent->getProperty( "description" );
      // reuse the event description
    .. .
    $d = sprintf( '%04d%02d%02d %02d%02d%02d', 2007, 3, 31, 15, 0, 0 );
    iCalUtilityFunctions::transformDateTime( $d, $tz, "UTC", "Ymd\THis\Z");
    $valarm->setProperty( "trigger", $d );
      // create alarm trigger (in UTC datetime)
    .. .
    $vevent = & $v->newComponent( 'vevent' );
      // create next event calendar component
    $vevent->setProperty( 'dtstart', '20070401', array('VALUE' => 'DATE'));
      // alt. date format, now for an all-day event
    $vevent->setProperty( "organizer" , 'boss@icaldomain.com' );
    $vevent->setProperty( 'summary', 'ALL-DAY event' );
    $vevent->setProperty( 'description', 'This is a description for an all-day event' );
    $vevent->setProperty( 'resources', 'COMPUTER PROJECTOR' );
    $vevent->setProperty( 'rrule', array( 'FREQ' => 'WEEKLY', 'count' => 4));
      // weekly, four occasions
    $vevent->parse( 'LOCATION:1CP Conference Room 4350' );
      // supporting parse of strict rfc2445 formatted text
    .. .
      // all calendar components are described in rfc2445
      // a complete iCalcreator function list (ex. setProperty) in iCalcreator manual
    .. .
    iCalUtilityFunctions::createTimezone( $v, $tz, $xprops);
      // create timezone component(-s) opt. 2
      // based on all start dates in events (i.e. dtstart)
  */
