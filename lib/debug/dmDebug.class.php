<?php

class dmDebug
{

	public function __construct()
	{
    self::debug(func_get_args());
	}

  /**
   * Gets a sfTimer instance.
   *
   * It returns the timer named $name or create a new one if it does not exist.
   *
   * @param string $name The name of the timer
   *
   * @return sfTimer The timer instance
   */
	public static function timer($name)
	{
    return sfTimerManager::getTimer("[Diem] $name");
	}

  /*
   * Builds an string
   *
   * @param $something Any PHP type
   *
   * @return string An formatted string
   */
	protected static function formatAsString($something)
	{
    if (is_array($something))
    {
      foreach($something as $key => $val)
      {
      	if (!is_string($val))
      	{
      		$something[$key] = print_r($val, true);
      	}
      }
      $string = implode(" - ", $something);
    }
    else
    {
    	$string = (string) $string;
    }

    return htmlspecialchars($string);
	}

  /*
   * Throws a dmException
   */
  public static function bug($something)
  {
    throw dmException::build($something);
  }

  /*
   * Throws a dmException if $condition is true
   */
  public static function bugIf($condition, $something)
  {
  	if ($condition)
  	{
      self::bug($something);
  	}
  }

  /*
   * Throws a dmException $condition is false
   */
  public static function bugUnless($condition, $something)
  {
    return self::bugIf(!$condition, $something);
  }

	/*
	 * Logs all parameters with symfony logger
	 */
	public static function log()
	{
		sfContext::getInstance()->getLogger()->log(
		  self::formatAsString(func_get_args()),
		  sfLogger::ERR
		);
	}

	/*
	 * Shows all parameter in the page with a <pre>
	 */
	public static function show()
	{
		return self::debugger(func_get_args(), 2, array("tag" => "div"));
	}

  /*
   * Shows all parameter in the page with a <div>
   */
	public static function traceShow()
	{
		return self::debugger(func_get_args(), 2, array("tag" => "div"));
	}

  /*
   * Shows all parameter in the page with a <pre>, even if debugging is disabled
   */
	public static function traceForce()
	{
		return self::debugger(func_get_args(), 2, array("force" => true));
	}

	public static function traceString()
	{
		return self::debugger(func_get_args(), 2, array("to_string" => true));
	}

	public static function debug()
	{
		return self::debugger(func_get_args(), 3);
	}

	public static function debugString()
	{
		return self::debugger(func_get_args(), 3, array("to_string" => true));
	}

	public static function debugForce()
	{
		return self::debugger(func_get_args(), 3, array("force" => true));
	}


	public static function simpleStack()
	{
		$result = "";
    $trace = debug_backtrace();
    foreach ($trace as $element)
    {
      if ($first)
      {
        $first = false;
      }
      else
      {
        $result .= "File: " . $lastFile . " function: " . $element['function'] . " line: " .$lastLine . "\n";
      }
      $lastFile = dmArray::get($element, 'file');
      $lastLine = dmArray::get($element, 'line');
    }
    echo $result;
	}

	/*
	 * Displays a debug backtrace improved with javascript
	 */
	public static function stack($msg = "")
	{
		sfContext::getInstance()->getConfiguration()->loadHelpers('Javascript', 'Tag');

		$result = "";
		$trace = debug_backtrace();
		$traceId = "pkSimpleBacktrace" . dmString::random();
		$traceIdShow = $traceId . "Show";
		$traceIdHide = $traceId . "Hide";
		$result .= "<div class='pkSimpleBacktrace'>Trace $msg" .
		link_to_function("&gt;&gt;&gt;",
        "document.getElementById('$traceId').style.display = 'block'; " .
        "document.getElementById('$traceId').style.display = 'block'; " .
        "document.getElementById('$traceIdShow').style.display = 'none'; " .
        "document.getElementById('$traceIdHide').style.display = 'inline'",
		array("id" => $traceIdShow)) .
		link_to_function("&lt;&lt;&lt;",
        "document.getElementById('$traceId').style.display = 'none'; " .
        "document.getElementById('$traceIdHide').style.display = 'none'; " .
        "document.getElementById('$traceIdShow').style.display = 'inline'",
		array("id" => $traceIdHide, "style" => 'display: none'));
		$result .= "</div>";
		$result .= "<pre id='$traceId' style='display: none'>\n";
		$first = true;
		foreach ($trace as $element)
		{
			if ($first)
			{
				$first = false;
			}
			else
			{
				$result .= "File: " . $lastFile . " function: " . $element['function'] . " line: " .$lastLine . "\n";
			}
			$lastFile = dmsArray::get($element, 'file');
			$lastLine = dmsArray::get($element, 'line');
		}
		$result .= "</pre>\n";
		echo $result;
	}

	protected static function debugger($var, $level = 1, $opt = array())
	{
		$CR = "\n";

		$die = ($level > 2);

		$opt = dmString::toArray($opt);

		$tag = dmArray::get($opt, "tag", "pre");

		if (!sfConfig::get("sf_debug") && !dmArray::get($opt, "force", false))
		{
			return;
		}

		if (dmArray::get($opt, "to_string", false) && is_array($var))
		{
			array_walk_recursive($var, create_function(
        '&$val',
        'if(is_object($val)) { if (method_exists($val, "__toString")) { $val = get_class($val)." : ".$val->__toString(); }}'
        ));
		}

		if(dmConfig::isCli())
		{
			print_r($var); if($die) { die(); }
		}

		array_walk_recursive($var, create_function(
      '&$val',
      'if(is_string($val)) { $val = htmlspecialchars($val); }'
    ));

      if (count($var) == 1)
      {
      	$var = dmArray::first($var);
      }

      if ($request = dm::getRequest())
      {
      	if ($request->isXmlHttpRequest())
      	{
      		echo "\n<$tag>";
      		print_r($var);
      		echo "</$tag>\n";
      		if ($die)
      		die();
      		return;
      	}
      }
      ob_start();
      if ($level > 1)
      {
      	print('<br /><'.$tag.' style="text-align: left; border: 1px solid #aaa; border-left-width: 10px; background-color: #f4F4F4; color: #000; margin: 3px; padding: 3px; font-size: 11px;">');
      	print_r($var);
      	print("</$tag>");
      }
      $buffer = ob_get_clean();

      if ($level == 4)
      {
      	ob_start();
      	echo'<pre>';
      	debug_print_backtrace();
      	echo '</pre>';
      	$dieMsg = ob_get_clean();
      }
      else
      {
      	$backtrace = debug_backtrace();

      	$dieMsg =
      	str_replace(sfConfig::get("sf_root_dir"), "", dmArray::get($backtrace[1], 'file')).
          " l.".dmArray::get($backtrace[1], 'line');

      	//      $dieMsg  = '<pre>';
      	//      $dieMsg .= isset($backtrace[0]['file']) ?     '> file     : <b>'.
      	//      $backtrace[1]['file'] .'</b>'. $CR : '';
      	//      $dieMsg .= isset($backtrace[0]['line']) ?     '> line     : <b>'.
      	//      $backtrace[1]['line'] .'</b>'. $CR : '';
      	//      $dieMsg .= isset($backtrace[1]['class']) ?    '> class    : <b>'.
      	//      dmArray::get(dmArray::get($backtrace, 2, array()), 'class') .'</b>'. $CR : '';
      	//      $dieMsg .= isset($backtrace[1]['function']) ? '> function : <b>'.
      	//      dmArray::get(dmArray::get($backtrace, 2, array()), 'function') .'</b>'. $CR : '';
      	//      $dieMsg .= '</pre>';
      }

      if ($level > 1)
      {
      	print($buffer);

      	if ($die)
      	die($dieMsg);
      	else
      	print($dieMsg);
      }
      else
      {
        sfWebDebug::getInstance()->logShortMessage($buffer.$dieMsg);
      }
	}
}