<?php

abstract class dmHtmlTag implements ArrayAccess
{

	protected static
	  $non_html_attributes = array('name', 'resource');

	protected
	  $options = array(
	    'class' => array()
	  );

	abstract public function render();

  public function __toString()
  {
  	try
  	{
      $string = $this->render();
  	}
  	catch(Exception $e)
  	{
  		if (sfConfig::get('sf_debug'))
  		{
  		  $string = $e->getMessage();
  		}
  		else
  		{
  			$string = " ";
  		}
  	}
  	return $string;
  }

	public function set($attr, $value = null)
	{
		if ($value)
		{
			$this[$attr] = $value;
		}
		else
		{
	    if ($first_space_pos = strpos($attr, " "))
	    {
	      $opt_string = substr($attr, $first_space_pos + 1);
	      $attr = substr($attr, 0, $first_space_pos);
	      // DMS STYLE - string opt in name
	      dmString::retrieveOptFromString($opt_string, $this->options);
	    }

	    // JQUERY STYLE - css expression
	    dmString::retrieveCssFromString($attr, $this->options);
		}
    return $this;
	}

  public function addClass()
  {
    $this->options['class'] = array_merge($this->options['class'], func_get_args());
    return $this;
  }

  public function removeClass($class)
  {
    if($this->hasClass($class))
    {
    	unset($this['class'][$class]);
    }
    return $this;
  }

  public function hasClass($class)
  {
    return in_array($class, $this['class']);
  }

  public function json($data)
  {
    return $this->addClass(str_replace('"', "'", json_encode($data)));
  }

  protected function getHtmlAttributesFromOptions()
  {
  	return $this->convertAttributesToHtml(
  	  $this->prepareAttributesForHtml(
  	    $this->excludeNonHtmlAttributes(
  	      $this->options
  	    )
  	  )
  	);
  }

  protected function excludeNonHtmlAttributes($attributes)
  {
    foreach($attributes as $key => $value)
    {
    	if(in_array($key, $this->getNonHtmlAttributes()))
    	{
    		unset($attributes[$key]);
    	}
    }
    return $attributes;
  }

  protected function getNonHtmlAttribute()
  {
    return self::$non_html_attributes;
  }

  protected function prepareAttributesForHtml($attributes)
  {
    if (isset($attributes['class']))
    {
      $attributes['class'] = trim(implode(' ', $attributes['class']));
    }
    return $attributes;
  }

  protected function convertAttributesToHtml($attributes)
  {
  	$html_attributes_string = '';
    foreach ($attributes as $key => $value)
    {
      if (!empty($value))
      {
        $html_attributes_string .= ' '.$key.'="'.htmlspecialchars($value, ENT_COMPAT, 'UTF-8').'"';
      }
    }
    return $html_attributes_string;
  }

  protected function debug($thing)
  {
    if (is_object($thing))
      return "[".get_class($thing)."] ".$thing;
    if (is_array($thing))
      return implode(", ", $thing);
    return $thing;
  }

  /**
   * Returns true if the bound field exists (implements the ArrayAccess interface).
   *
   * @param  string $name The name of the bound field
   *
   * @return Boolean true if the option exists, false otherwise
   */
  public function offsetExists($name)
  {
    return isset($this->options[$name]);
  }

  /**
   * Returns the option associated with the name (implements the ArrayAccess interface).
   *
   * @param  string $name  The offset of the value to get
   *
   * @return sfFormField   An option
   */
  public function offsetGet($name)
  {
    if (!isset($this->options[$name]))
    {
      throw new InvalidArgumentException(sprintf('Option "%s" does not exist.', $name));
    }

    return $this->options[$name];
  }

  /**
   * Sets an option (implements the ArrayAccess interface).
   *
   * @param string $offset
   * @param string $value
   *
   */
  public function offsetSet($offset, $value)
  {
    $this->options[$offset] = $value;
  }

  /**
   * Removes a field from the form.
   *
   * It removes the widget and the validator for the given field.
   *
   * @param string $offset The field name
   */
  public function offsetUnset($offset)
  {
    if (!isset($this->options[$offset]))
    {
      throw new InvalidArgumentException(sprintf('Option "%s" does not exist.', $name));
    }
    unset($this->options[$offset]);
  }

}