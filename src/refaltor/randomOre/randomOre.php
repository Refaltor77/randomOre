<?php

namespace refaltor\randomOre;

use pocketmine\plugin\PluginBase;

class randomOre extends PluginBase
{
    public function onEnable()
    {
        $this->saveResource('config.yml');
        foreach ($this->getConfig()->getAll()['drops'] as $string => $keys){
            if (!isset($keys['amount'])){
                $this->getServer()->getLogger()->error('§cConfig error: undefined `amount`');
                $this->getServer()->getPluginManager()->disablePlugin($this);
            }
        }
        $this->getServer()->getPluginManager()->registerEvents(new BlockListener($this), $this);
    }
}