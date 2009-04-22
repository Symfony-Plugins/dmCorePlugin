<?php

abstract class dmServiceTask extends dmBaseTask
{

  public function initialize(sfEventDispatcher $dispatcher, sfFormatter $formatter)
  {
    parent::initialize($dispatcher, $formatter);

    /*
     * Redirects the service logs to the command logs
     */
    $this->dispatcher->connect('dm.service.log', array($this, 'dispatchLogToCommandLog'));
    /*
     * Redirects the service alerts to the command log
     */
    $this->dispatcher->connect('dm.service.alert', array($this, 'dispatchAlertToCommandLog'));
  }

  public function dispatchLogToCommandLog(sfEvent $event)
  {
  	$this->logSection($this->name, dmArray::get($event->getParameters(), 'message'));
    return true;
  }

  public function dispatchAlertToCommandLog(sfEvent $event)
  {
    $this->logSection($this->name, "### ALERT ### ".dmArray::get($event->getParameters(), 'message'));
    return true;
  }

  protected function executeService($name, $options = array())
  {
    $service_class = $name."Service";

    if (!class_exists($service_class))
    {
    	dmDebug::bug($service_class." does not exists");
    }

  	$service = new $service_class($this->dispatcher, $this->formatter);
    $service->addOptions($options);
    return $service->execute();
  }

}