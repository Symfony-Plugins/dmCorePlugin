<?php

class dmSpriteGenerator
{

	protected
	  $dispatcher,
	  $filesystem;

	public function __construct(sfEventDispatcher $dispatcher)
	{
		$this->filesystem = dmFilesystem::get();
	}

	public function execute($size, $css_file, $classes)
	{
    dmDebug::bugUnless(is_writable($css_file), "$css_file is not writable");

    $css = array();
    $pos = 0;
    foreach($classes as $class)
    {
    	$css[] = '.s16_'.$class.' { background-position: 0 -'.$pos.'px; }';
      $pos += $size;
    }

    file_put_contents($css_file, implode("\n", $css));
	}

}