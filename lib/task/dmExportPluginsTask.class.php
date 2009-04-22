<?php

class dmExportPluginsTask extends dmServiceTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
  	parent::configure();

  	$this->namespace = 'dm';
    $this->name = 'export-plugins';
    $this->briefDescription = 'Exporte diem en .tgz dans le dossier de cache';

    $this->detailedDescription = 'Exporte le projet en .tgz dans le dossier de cache';
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
  	return $this->executeService("dmExportPlugins", $options);
  }

}