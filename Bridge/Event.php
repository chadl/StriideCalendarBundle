<?php
namespace Striide\CalendarBundle\Bridge;

class Event extends \Eluceo\iCal\Component\Event
{
  protected $custom_description = array();
  public function setCustomDescription($id,$description)
  {
    $this->custom_description = array('id' => $id, 'description' => $description);
  }
  
  public function buildPropertyBag()
  {
    parent::buildPropertyBag();
    
    if( !empty($this->custom_description))
    {
      $this->properties->set(sprintf('DESCRIPTION;ALTREP="CID:%s"',$this->custom_description['id']) ,$this->custom_description['description']); 
    }
  }
}