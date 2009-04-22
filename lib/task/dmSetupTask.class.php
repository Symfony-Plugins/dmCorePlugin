<?php

/**
 * Install Diem
 */
class dmSetupTask extends dmServiceTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    parent::configure();

    $this->namespace = 'dm';
    $this->name = 'setup';
    $this->briefDescription = 'Creates symlinks';

    $this->detailedDescription = <<<EOF
Will create symlinks in your web directory
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    return $this->executeService("dmSetup", $options);
  }
}
