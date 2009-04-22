<?php

/*
 * A service can be used either in web or cli environment and uses a dmEventDispatcher
 */
abstract class dmService
{

	protected
	  $options = array(),
	  $dispatcher,
	  $filesystem,
	  $formatter,
	  $event_name;

	public function __construct(sfEventDispatcher $dispatcher, sfFormatter $formatter = null)
	{
		$this->dispatcher = $dispatcher;
    $this->formatter  = $formatter ? $formatter : new sfFormatter(200);
    $this->filesystem = new dmFilesystem($this->dispatcher, $this->formatter);
	}

	public function addOptions(array $options)
	{
		$this->options = array_merge($this->options, $options);
	}

  public function getOption($key, $default = null)
  {
    return dmArray::get($this->options, $key, $default);
  }

  public function setOption($key, $value)
  {
    return $this->options[$key] = $value;
  }

  protected function log($message)
  {
    return $this->dispatcher->notifyUntil(new sfEvent(
      $this, 'dm.service.log', array('message' => $message)
    ));
  }

  protected function alert($message)
  {
    return $this->dispatcher->notifyUntil(new sfEvent(
      $this, 'dm.service.alert', array('message' => $message)
    ));
  }

}