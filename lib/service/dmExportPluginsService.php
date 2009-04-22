<?php

class dmExportPluginsService extends dmService
{

  public function execute()
  {
  	$tar_name = "diem_".dmConfig::get("version")."_".date("y-m-d_H-i-s");
  	$exclude = array(
      ".svn",
      "plugins/.*",
      "plugins/*/lib/model/om/*",
      "plugins/*/lib/model/map/*",
      "plugins/*/lib/form/base/*",
      "plugins/*/lib/filter/base/*"
    );
    $command = sprintf(
      'tar -czf cache/'.$tar_name.'.tgz plugins %s',
      '--exclude='.implode(" --exclude=", $exclude)
    );

    $this->log($command);

    if (!$this->filesystem->exec($command))
    {
    	$this->alert($this->filesystem->getLastExec('output'));
    }
  }

}