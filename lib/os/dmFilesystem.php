<?php

class dmFilesystem extends sfFilesystem
{

	protected static
	  $instance;

	protected
	  $last_exec; // array(command, output, return)

	public static function get()
	{
		if (self::$instance === null)
		{
	    self::$instance = new self();
		}
		return self::$instance;
	}

	public function whois($ip = null)
	{
		$ip = $ip ? $ip : $_SERVER['REMOTE_ADDR'];

		if ($this->exec("whois $ip"))
    {
      $array = explode("<br />", $this->getLastExec("output"));
      $infos = array();
      foreach($array as $key => $val)
      {
        if ($pos = strpos($val, ":"))
        {
          $k = substr($val, 0, $pos);
          $v = trim(substr($val, $pos+1));
          if (isset($infos[$k]))
          {
            $infos[$k][] = $v;
          }
          else
          {
            $infos[$k] = array($v);
          }
        }
      }
      foreach($infos as $key => $values)
      {
        $infos[$key] = implode("\n", array_unique($values));
      }
    }
    else
    {
    	$infos = array();
    }
    return $infos;
	}

  public function mkdir($path, $mode = 0777)
  {
    if (is_dir($path))
    {
      if (!is_writable($path))
      {
        chmod($path, $mode);
        return is_writable($path);
      }
      return true;
    }
    if (mkdir($path, $mode, true))
    {
      return is_writable($path);
    }
    return false;
  }

  public function touch($file, $mode = 0777)
  {
    if (file_exists($file))
    {
      if (!is_writable($file))
      {
        chmod($file, $mode);
        return is_writable($file);
      }
      return true;
    }
    if (touch($file))
    {
      return is_writable($file);
    }
    else
    {
    	return false;
    }
    return true;
  }

	public function find($type = "any")
	{
		return sfFinder::type($type);
	}

	public function getFileInfos($file)
	{
	  if (!file_exists($file))
	  {
		  return '[x]';
	  }
	  $username = function_exists('posix_getpwuid')
    ? dmArray::get(@posix_getpwuid(dmArray::get(stat($file), "uid")), "name")
    : '';
    $permissions = substr(decoct(fileperms($file)), 2);

    return $username.":".$permissions;
	}

	public function exec($command)
	{
		exec($command, $output, $return_code);
		$this->last_exec = array(
		  "command" => $command,
		  "output" => implode("<br />", $output),
		  "return" => $return_code
		);
		return $return_code == 0;
	}

	public function sf($command)
	{
    $sf_command = sprintf(
      '%s "%s" %s',
      sfToolkit::getPhpCli(),
      sfConfig::get("sf_root_dir").'/symfony',
      "$command"
    );
    return $this->exec($sf_command);
	}

	public function getLastExec($key = null)
	{
		if ($key === null)
		{
			return $this->last_exec;
		}
		return dmArray::get($this->last_exec, $key);
	}


  public function unlink($files)
  {
    if (!is_array($files))
    {
      $files = array($files);
    }
    $success = true;
    $files = array_reverse($files);
    foreach ($files as $file)
    {
      if (is_dir($file) && !is_link($file))
      {
        $success &= $this->deleteDir($file);
      }
      elseif(is_file($file))
      {
        $success &= @unlink($file);
      }
    }
    return $success;
  }

}