<?php

abstract class dmLinkResource
{
	const
	URI = 'uri',
	MODEL = 'model',
	PAGE = 'page',
	ACTION = 'action',
	ERROR = 'error';

	public static function build($source = null)
	{
		$type = self::getSourceType($source);
		$class = 'dmLinkResource'.dmString::camelize($type);
		return new $class($source, $type);
	}

	public function __construct($source, $type)
	{
		$this->source = $source;
		$this->type = $type;
	}

	public function getSource()
	{
		return $this->source;
	}

	public function getType()
	{
		return $this->type;
	}

	public static function getSourceType($source)
	{
		if (empty($source))
		{
			return self::INTERNAL;
		}
		elseif (is_int($source))
		{
			if ($page = dm::db('DmPage')->findPk($source))
			{
				return self::PAGE;
			}
			else
			{
				return self::ERROR;
			}
		}
		elseif (is_string($source))
		{
			// lien externe http
			if(strncmp($source, "http://", 7) === 0)
			{
				return self::URI;
			}
			// lien externe ftp
			if(strncmp($source, "ftp://", 6) === 0)
			{
				return self::URI;
			}
			// lien externe mailto
			if(strncmp($source, "mailto:", 7) === 0)
			{
				return self::URI;
			}
			// routing rule
			elseif(strncmp($source, "@", 1) === 0)
			{
				return self::URI;
			}
			// ancre
			elseif(strncmp($source, "#", 1) === 0)
			{
				return self::URI;
			}
			// dms action
			elseif(strncmp($source, "action/", 7) === 0)
			{
				$this->what = str_replace("action/", "", $source);
				$this->what_type = "dms";
			}
			// dms action ( rétro compatibilité pour les liens qui utilisent dms/ pour désigner une action )
			// si dms/xxx/xxx => action, sinon page spéciale
			elseif(strncmp($source, "dms/", 4) === 0 && substr_count($source, "/") == 2)
			{
				$this->what = str_replace("dms/", "", $source);
				$this->what_type = "dms";
			}
			// module/action dms
			elseif(count($parts = explode("/", $source)) === 2)
			{
				$this->what = $parts;
				$this->what_type = "module/action";
			}
			// erreur
			else
			{
				$this->what = $source;
				$this->what_type = "error";
			}
		}
		elseif (is_object($source))
		{
			if ($source instanceof DmsPage)
			{
				$this->what = $source;
				$this->what_type = "page";
			}
			elseif ($source instanceof DmsMediaFile)
			{
				$this->what = $source;
				$this->what_type = "media";
			}
			else
			{
				$this->what = $source;
				$this->what_type = "object";
			}
		}
		else
		{
			$this->what = $source;
			$this->what_type = "error";
		}
	}
}