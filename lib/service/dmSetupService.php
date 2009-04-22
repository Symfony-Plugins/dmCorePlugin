<?php

class dmSetupService extends dmService
{

	/*
	 * Performs, verify, update Diem installation
	 */
  public function execute()
  {
  	$this->log("Installation...");

  	$this->clearCache();

    $this->createAssetSymlinks();

    $this->updateMysql();

    $this->buildModel();

    $this->buildForms();

    $this->buildFilters();

    $this->loadData();

    $this->buildSprites();

    $this->clearCache();
  }

  protected function clearCache()
  {
    $service = new dmClearCacheService($this->dispatcher, $this->formatter);

    $service->execute();
  }

  protected function updateMysql()
  {
    $this->log("update mysql");
    $task = new sfPropelInsertSqlDiffTask($this->dispatcher, $this->formatter);
    $task->run(array(), array());
  }

  protected function buildModel()
  {
    $this->log("build propel model");

    sfToolkit::clearDirectory(dmOs::join(sfConfig::get("sf_lib_dir"), "model/map"));
    sfToolkit::clearDirectory(dmOs::join(sfConfig::get("sf_lib_dir"), "model/om"));

    $task = new sfPropelBuildModelTask($this->dispatcher, $this->formatter);
    $task->run(array(), array());
  }

  protected function buildForms()
  {
    $this->log("build propel forms");
    $task = new sfPropelBuildModelTask($this->dispatcher, $this->formatter);
    $task->run(array(), array());
  }

  protected function buildFilters()
  {
    $this->log("build propel filters");
    $task = new sfPropelBuildFiltersTask($this->dispatcher, $this->formatter);
    $task->run(array(), array());
  }

  protected function loadData()
  {
    $service = new dmDataService($this->dispatcher, $this->formatter);
    $service->execute();
  }
  protected function buildSprites()
  {
    $service = new dmSpriteService($this->dispatcher, $this->formatter);
    $service->execute();
  }

  protected function createAssetSymlinks()
  {
  	$project_web_path = dmOs::join(sfConfig::get("sf_root_dir"), sfConfig::get("sf_web_dir"));

  	$this->filesystem->mkdir($project_web_path);

  	foreach(array("core", "admin", "front") as $plugin)
  	{
  		$origin = dmOs::join(sfConfig::get("dm_{$plugin}_dir"), "web");
  		$target = dmOs::join($project_web_path, sfConfig::get("dm_{$plugin}_asset"));

      $this->log("symlink $target");
      $this->filesystem->relativeSymlink($origin, $target);
  	}
  }

}