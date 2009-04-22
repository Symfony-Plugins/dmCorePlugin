<?php

sfConfig::add(array(
  'dm_version'     => '5.0-SNAPSHOT',
  'dm_core_dir'    => realpath(dirname(__FILE__)."/.."),
  'dm_core_asset'  => 'dm/core'
));

sfConfig::set("dm_enabled_parts", array_merge(sfConfig::get("sf_enabled_parts", array()), array("core")));