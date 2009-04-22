<?php

class DmSite extends BaseDmSite
{
  public function save(PropelPDO $con = null)
  {
  	if (!$this->getName())
  	{
  		$this->setName(dmString::humanize(dmConfig::getProjectKey()));
  	}

  	return parent::save($con);
  }
}