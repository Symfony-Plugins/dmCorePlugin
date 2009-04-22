<?php

class dmException extends sfException
{

	/*
	 * Builds an exception
   *
   * @param $something Any PHP type
   *
   * @return dmException An dmException instance that wraps the given something
	 */
	public static function build($something)
	{
		if ($something instanceof Exception)
		{
	    $exception = new dmException(sprintf('Wrapped %s: %s', get_class($e), $e->getMessage()));
	    $exception->setWrappedException($e);
		}
		elseif(is_array($something))
		{
			$exception = new dmException(self::formatArrayAsHtml($something));
		}
		else
		{
			$exception = new dmException($something);
		}
		return $exception;
	}

}