<?php

class DmPage extends BaseDmPage
{

	/*
	 * An automagic page represents an object ( article, product... )
	 * It will be created, updated and deleted according to its object
	 * Automagic pages with the same module will share the same DmPageView & DmAutoSeo
	 */
	public function isAutomagic()
	{
		if ($this->getAction() === 'show')
		{
      return dmModule::get($this->getModule())->getOption('auto');
		}
		return false;
	}

	public function setModuleAction($module, $action = null)
	{
    list($module, $action) = dmString::separate($module, $action);

    return $this->setModule($module)->setAction($action);
	}

	public function save(PropelPDO $con = null)
	{
    if (!$this->getDmPageView($con) instanceof DmPageView)
    {
      $this->setDmPageView($this->findAutoPageViewOrCreate());
    }

    $return = parent::save($con);

    return $return;
	}

	protected function findAutoPageViewOrCreate()
	{
    if ($this->isAutomagic())
    {
      if(!$page_view = dm::db('DmPageView')
      ->join('DmPage')
      ->where('DmPage.Module', $this->getModule())
      ->where('DmPage.Action', $this->getAction())
      ->where('DmPage.DmPageView', 'is not null')
      ->findOne())
      {
        $page_view = new DmPageView();
        $page_view->setDmLayout(DmLayoutPeer::getFirstOrCreate());
        $page_view->save();
      }
    }
    else
    {
      $page_view = new DmPageView();
      $page_view->setDmLayout(DmLayoutPeer::getFirstOrCreate());
      $page_view->save();
    }
    return $page_view;
	}

}