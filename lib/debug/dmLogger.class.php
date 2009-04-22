<?php

class dmLogger extends sfLogger
{
  protected function doLog($message, $priority)
  {
    error_log(sprintf('%s (%s)', $message, sfLogger::getPriorityName($priority)));
  }
}