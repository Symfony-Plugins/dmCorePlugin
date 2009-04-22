<?php

class DmPeerBuilder extends SfPeerBuilder
{
  public function build()
  {
    $peerCode = parent::build();

    return $peerCode;
  }

  protected function addConstantsAndAttributes(&$script)
  {
    parent::addConstantsAndAttributes($script);
    $script .= <<<EOF

  public static function build()
  {
    return new {$this->getTable()->getPhpName()}();
  }

EOF;
  }

}
