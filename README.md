StriideCalendarBundle
=====================

The intent for this Bundle is to provide a bridge between http://kigkonsult.se/iCalcreator/ and Symfony

Routing
-------

StriideCalendarBundle:
    resource: "@StriideCalendarBundle/Resources/config/routing.yml"
    prefix:   /
    
Example Use:
------------

<pre>
    $calendar = new Calendar();
    $calendar->setGuid(md5("some unique randome identifier));
    $calendar->setName("My Calendar Feed");
    $calendar->setDescription("Description of my Calendar Feed");

    $items = ...; // set of events to be used in the calendar feed

    foreach($items as $item)
    {
      $ce = new Event();
      $ce->setStarttime($item->getLocalStartTime());
      $ce->setLocation($item->getLocation());
      $ce->setEndtime($item->getLocalEndTime());
      $ce->setName($item->getTitle());
      
      $calendar->addEvent($ce);
      $calendar->setTimezone($item->getDateTimeZone());
    }

    $ics = $this->get('striide_calendar.service')->calendarToIcs($calendar);
    $filename = "feed.ics";
    return new Response(
                        $ics->render(),
                        200,
                        array(
                              'Content-type' => "text/calendar",
                              'Content-Disposition' => 'inline; filename="'.$filename.'"'
                            )
                          );
</pre>
