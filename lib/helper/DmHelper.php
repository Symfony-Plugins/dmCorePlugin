<?php

function dm_link_to($name, $internal_uri, $options = array())
{
	return link_to1($name, $internal_uri, dmString::toArray($options));
}

/*
 * a, class='tagada ergrg' id=zegf, contenu
 * a class=tagada id=truc, contenu
 * a, contenu
 * a, array(), contenu
 * a#truc.tagada, contenu ** NEW **
 */
function £o($name, $opt = array())
{
  return £($name, $opt, false, "open");
}

function £c($name)
{
  if (($pos = strpos($name, ".")) !== false)
  {
    $classes = substr($name, $pos+1);
    $name = substr($name, 0, $pos);
    if (strpos($classes, "beafh") !== false || strpos($classes, "beafv") !== false)
    {
      if (in_array($name, array("span", "a", "p")))
      {
        $beaf_tag = "span";
      }
      else
      {
        $beaf_tag = "div";
      }
      return '</'.$beaf_tag.'><'.$beaf_tag.' class="beafter"></'.$beaf_tag.'></'.$name.'>';
    }
  }
  return '</'.$name.'>';
}

function £($name, $opt = array(), $content = false, $do = "full")
{
  //$profile = true && aze::isDev();

  //if ($profile) $timer = aze::timer("£");

  if (!($name = trim($name)))
  {
    return '';
  }

  $tag_opt = array();

  // séparation du nom du tag et des attributs dans $name
  if ($first_space_pos = strpos($name, " "))
  {
    $name_opt = substr($name, $first_space_pos + 1);
    $name = substr($name, 0, $first_space_pos);

    // DMS STYLE - string opt in name
    dmString::retrieveOptFromString($name_opt, $tag_opt);
  }

  // JQUERY STYLE - css expression
  dmString::retrieveCssFromString($name, $tag_opt);

  // ARRAY STYLE - array opt

  if (is_array($opt) && count($opt))
  {
    if (isset($opt["json"]))
    {
      if (!isset($tag_opt["class"]))
      {
        $tag_opt["class"] = json_encode($opt["json"]);
      }
      else
      {
        $tag_opt["class"] .= " ".json_encode($opt["json"]);
      }
      unset($opt["json"]);
    }
    if (isset($opt["class"]))
    {
      if (!isset($tag_opt["class"]))
      {
        $tag_opt["class"] = $opt["class"];
      }
      else
      {
        $tag_opt["class"] .= " ".$opt["class"];
      }
      unset($opt["class"]);
    }
    $tag_opt = array_merge(
      $tag_opt,
      $opt
    );
  }

  // SYMFONY STYLE - string opt

  elseif (is_string($opt) && $content)
  {
    $opt = sfToolkit::stringToArray($opt);
    if (isset($opt["class"]))
    {
      if (!isset($tag_opt["class"]))
      {
        $tag_opt["class"] = $opt["class"];
      }
      else
      {
        $tag_opt["class"] .= " ".$opt["class"];
      }
      unset($opt["class"]);
    }
    $tag_opt = array_merge(
      $tag_opt,
      $opt
    );
  }

  if (!$content) // Pas de content
  {
    if (!is_array($opt))
    {
      $content = $opt;
    }
    else // Pas de opt
    {
      if ($name === "span")
      {
        $content = "&nbsp;";
      }
      else
      {
        $content = null;
      }
    }
  }

  $class = isset($tag_opt["class"]) ? $tag_opt["class"] : "";

  if (strpos($class, "beafh") !== false || strpos($class, "beafv") !== false)
  {
    $is_beaf = true;
    $tag_opt["class"] = $class." clearfix";
    if (in_array($name, array("span", "a", "p")))
    {
      $beaf_tag = "span";
    }
    else
    {
      $beaf_tag = "div";
    }
  }
  else
  {
    $is_beaf = false;
  }

  if(isset($tag_opt["lang"]))
  {
    if($tag_opt["lang"] == $sf_user->getCulture())
    {
      unset($tag_opt["lang"]);
    }
  }

  $opt_html = '';
  foreach ($tag_opt as $key => $val)
  {
    $opt_html .= ' '.$key.'="'.escape_once($val).'"';
  }

  if ($do === "full")
  {
    if ($is_beaf)
    {
      $tag = '<'.$name.$opt_html.'><'.$beaf_tag.' class="beafore"></'.$beaf_tag.'><'.$beaf_tag.' class="beafin">'.$content.'</'.$beaf_tag.'><'.$beaf_tag.' class="beafter"></'.$beaf_tag.'></'.$name.'>';
    }
    else
    {
     $tag = '<'.$name.$opt_html.'>'.$content.'</'.$name.'>';
    }
  }
  else
  {
    if ($is_beaf)
    {
      $tag = '<'.$name.$opt_html.'><'.$beaf_tag.' class="beafore"></'.$beaf_tag.'><'.$beaf_tag.' class="beafin">';
    }
    else
    {
     $tag = '<'.$name.$opt_html.'>';
    }
  }

  //if ($profile) $timer->addTime();

  return $tag;
}