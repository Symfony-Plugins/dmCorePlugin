<?php

abstract class dmLinkTag extends dmHtmlTag
{

  public function __construct($resource = null)
  {
  	if (!$resource instanceof dmLinkResource)
  	{
  		$resource = dmLinkResource::build($resource);
  	}
    $this->set('resource', $resource)->addClass('link');
  }

  public function name($v)
  {
    return $this->set('name', (string) $v);
  }

  public function title($v)
  {
    return $this->set('title', (string) $v);
  }

  public function nameTitle($v)
  {
  	return $this->name($v)->title($v);
  }

  public function rss($v)
  {
    return $this->set('rss', (bool) $v);
  }

  public function blank($v)
  {
    return $this->set('blank', (bool) $v);
  }

  public function anchor($v)
  {
    return $this->set('anchor', str_replace("#", "", (string) $anchor));
  }

  public function app($v)
  {
    return $this->set('app', (string) $v);
  }

  public function facebox()
  {
    return $this->addClass("facebox_me", "dms_facebox");
  }


  public function render()
  {
    $page = $this->getPage();
    $is_current = false;
    $is_curent_parent = false;

    $options = $this->options;

    if (!($page instanceof DmsPage) && !aze::isIn($this->what_type, 'anchor external dms media download'))
    {
      if ($this->options["config"]["or_span"])
      {
        unset($this->options["params"]);
        unset($this->options["config"]);
        unset($this->options["target"]);
        unset($this->options["title"]);
        unset($this->options["rss"]);
        return content_tag("span", $this->name, $this->options);
      }
      else
      {
        return dmsTools::error("DmsLinkTag ne peut faire de lien vers ". $this->debug($this->what).' '.$this->debug($this->what_type));
      }
    }

    if ($this->name)
    {
    	$name = $this->name;
    }
    else
    {
      if ($this->what_type == "page")
      {
        $name = $page->getNameRef();
      }
      elseif($this->what_type == "media")
      {
        $name = $page->getLegendOrNom();
      }
      elseif(is_object($page))
      {
        $name = $page->__toString();
      }
      else
      {
      	$name = (string) $page;
      }
    }

    if(aze::isIn($this->what_type, 'anchor external dms'))
    {
      $url = $page;
      $this->options["href"] = $url;

      // si on a pas un lien vers le nom de domaine courant
      if ($this->what_type != "anchor" && $this->what_type != "dms" && stripos($url, aze::getAbsoluteUrlRoot()) !== 0)
      {
        $this->blank(true);
      }
      // si on a un lien vers un fichier
      elseif (strpos(substr($url, -5), ".") !== false)
      {
        $my_ext = aze::getExtension($url, false);
        if (array_search($my_ext, self::getDownloadExtensions()))
        {
          $download_title = dmsI18n::__("Téléchargement");
          $this->title(
            ($title = aze::getArrayKey($this->options, "title"))
            ? $title." - ".$download_title
            : $download_title
          );
          $this->blank(true);
          $this->css(".download");
          DmsSlotSoftware::registerExtension($my_ext);
        }
      }
    }
    elseif($this->what_type === "download")
    {
      $url = $page;
      $this->options["href"] = $url;
      $download_title = dmsI18n::__("Téléchargement");
      $this->title(
        ($title = aze::getArrayKey($this->options, "title"))
        ? $title." - ".$download_title
        : $download_title
      );
      $this->css(".download");
    }
    elseif($this->what_type == 'media')
    {
      $this->options["href"] = aze::getRelativeUrlRoot()."/".aze::getUploadDirName()."/".$page->getRelativePath();
      $this->blank(true);
      $this->css(".download");
      DmsSlotSoftware::registerExtension($this->what->getExtension(false));
      $download_title = dmsI18n::__("Téléchargement")." ".aze::tailleHumaine($page->getFilesize());
      $this->title(
        ($title = aze::getArrayKey($this->options, "title"))
        ? $title." - ".$download_title
        : $page->getLegendOrNom()." - ".$download_title
      );
    }
    else
    {
      if (!$page->isVisible() && !$this->options["rss"])
      {
        return $name;
      }

      if ($current_page = dmsTools::getPage())
      {
        if ($is_current = ($current_page->getId() === $page->getId()))
        {
          $this->_class($this->options["config"]["current_class"]);
        }
        elseif($is_current_parent = ($current_page->isDmsDescendantOf($page)))
        {
          $this->_class($this->options["config"]["current_parent_class"]);
        }
      }
      if ($this->options["rss"])
      {
        $this->options["href"] = dmsTools::getBaseUrl()."rss/".$page->getSlugRef();
        if (!isset($this->options["title"]))
        {
          $this->title(dmsI18n::__("Abonnement RSS 2"));
        }
      }
      else
      {
        if ($this->options["config"]["app"] == sfConfig::get("sf_app"))
        {
          $href = dmsTools::getBaseUrl().$page->getSlugRef();
        }
        else
        {
          $href = aze::getUrlForApp($this->options["config"]["app"])."/".$page->getSlugRef();
        }
        $this->options["href"] = $href;
      }
    }

    $this->options["class"] = trim($this->options["class"]);

    if ($this->options["class"] === "")
    {
      unset($this->options["class"]);
    }

    unset($this->options["rss"]);

    if (isset($this->options["anchor"]))
    {
      $this->options["href"] .= "#".$this->options["anchor"];
      unset($this->options["anchor"]);
    }

    if (isset($this->options["params"]))
    {
      if (!aze::isIn("?", $this->options["href"]))
        $this->options["href"] .= "?";

      $this->options["href"] .= http_build_query($this->options["params"], '', '&amp;');

      unset($this->options["params"]);
    }

    if (aze::getArrayKey($this->options, "target") == "_blank")
    {
      if (empty($this->options["title"]))
      {
        $this->title(dmsI18n::__("nouvelle fenêtre"));
      }
      else
      {
        $this->title($this->options["title"]." - ".dmsI18n::__("nouvelle fenêtre"));
      }
    }

    if (isset($this->options["id"]) && empty($this->options["id"]))
    {
      unset($this->options["id"]);
    }

    if (isset($this->options["title"]) && empty($this->options["title"]))
    {
      unset($this->options["title"]);
    }

    $current_is_span = $this->options["config"]["current_is_span"];

    unset($this->options["config"]);

    if ($this->options["target"] == "")
    {
      unset($this->options["target"]);
    }

    // gestion du beaf
    if (strpos($this->options["class"], "beafh") !== false || strpos($this->options["class"], "beafv") !== false)
    {
    	$name = '<span class="beafore">&nbsp;</span><span class="beafin">'.$name.'</span><span class="beafter">&nbsp;</span>';
    }

    if ($is_current && $current_is_span)
    {
      unset($this->options["href"]);
      unset($this->options["target"]);
      $tag = '<span'.$this->getHtmlOptions($this->options).'>'.$name.'</span>';
    }
    else
    {
      $this->options["href"] = str_replace(aze::getUriPrefix(), "", $this->options["href"]);
      $tag = '<a'.$this->getHtmlOptions($this->options).'>'.$name.'</a>';
    }

    return $tag;
  }



  protected static function getDownloadExtensions()
  {
    if (self::$download_extensions === null)
    {
      self::$download_extensions = explode(" ",
        "htm html jpg jpeg gif png bmp pdf doc docx odt ods sxw ppt xls zip rar gz gzip bz2 avi flv mov mpg mpeg asf wmv mp3 mp4 ogg oga wav rtf mpc phps"
      );
    }
    return self::$download_extensions;
  }

}