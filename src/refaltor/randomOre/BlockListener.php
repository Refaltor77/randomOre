<?php

namespace refaltor\randomOre;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;

class BlockListener implements Listener
{
    private $plugin;

    public function __construct($plugin)
    {
        $this->plugin = $plugin;
    }

    public function onBreak(BlockBreakEvent $event)
    {
        
        $block = $event->getBlock();
        $array = $this->plugin->getConfig()->getAll();

        if ($block->getId() . ":" . $block->getDamage() === $array['randomOre']){
            foreach ($array['drops'] as $id => $keys){
                
                $item = explode(":", $id);
                
                if (isset($keys['chance'])){
                    if (mt_rand(1, $keys['chance']) === 1){               
                        $item = Item::get($item[0], $item[1], $keys['amount']);
                        if (isset($keys['name']) && $keys['name'] !== null) 
                            $item->setCustomName($keys['name']);
                        $event->setDrops([$item]);
                    }
                } else {
                   $item = Item::get($item[0], $item[1], $keys['amount']);
                   if (isset($array['name']) && $keys['name'] !== null) 
                       $item->setCustomName($keys['name']);
                   $event->setDrops([$item]);
                }
            }
        }
    }
}
