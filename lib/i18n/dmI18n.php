<?php

class dmI18n
{

	protected static
		$config,
		$default_culture,
		$enabled,
		$engine;

	public static function init()
	{
		self::fixCulture();
	}

	public static function isEnabled()
	{
		if (is_null(self::$enabled))
		{
		  self::$enabled = (count(self::getCultures()) > 1) && sfConfig::get('sf_i18n');
		}
		return self::$enabled;
	}

	public static function __($text, $args = array())
	{
	  if (!sfConfig::get("sf_i18n")) return $text;
		$timer = aze::timer("dmsI18n translation");
		if (is_null(self::$engine))
		{
		  self::$engine = sfContext::getInstance()->getI18n();
		}
		$trans = self::$engine->__($text, $args);

		if (false && $text == $trans)
		{
			$trans = self::auto__($text, "fr", self::getCulture());
		}
		$timer->addTime();

		return $trans;
	}

	public static function auto__($sentence, $source, $dest)
	{
		$url = "http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=".urlencode($sentence)."&langpair=".$source."%7C".$dest;

	  // sendRequest
	  // note how referer is set manually
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_REFERER, sfConfig::get('app_i18nTranslatePlugin_referer', 'http://livepetitions.com' ));
	  $body = curl_exec($ch);
	  curl_close($ch);

	  // now, process the JSON string
	  $json = json_decode($body);
	  // now have some fun with the results...
	  if ($json->responseStatus == 200)
	  {
	    return $json->responseData->translatedText;
	  }
	  else
	  {
	    return $sentence;
	  }
	}

	public static function getCultures()
	{
		return self::getConfig("cultures", array("fr"));
	}

	public static function getConfig($key = null, $default = null)
	{
		if (self::$config === null)
		{
		  self::$config = sfConfig::get("app_site_i18n", array());
		}

		if ($key === null)
		{
		  return self::$config;
		}

		return aze::getArrayKey(self::$config, $key, $default);
	}

	public static function fixCulture()
	{
		if (!self::cultureExists(self::getCulture()))
		{
//		  if (self::getCulture() != self::$default_culture)
//		  {
		    self::setCulture(self::$default_culture);
//		  }
		}
	}

	public static function cultureExists($c)
	{
		return in_array($c, self::getCultures());
	}

	public static function isCulture($c)
	{
		return self::getCulture() == $c;
	}

	public static function getCulture() { return aze::getUser()->getCulture(); }
	public static function setCulture($c) { return aze::getUser()->setCulture($c); }

	public static function getTranslatableModels()
	{
		$models = sfPropul::getAllModels(false);
		foreach ($models as $key=>$model)
		  if (!sfPropul::getModelI18n($model))
		    unset($models[$key]);
		return $models;
	}

	public static function getDefaultCulture()
	{
		if (self::$default_culture === null)
		{
			self::$default_culture = "fr";
		}
		return self::$default_culture;
	}

}