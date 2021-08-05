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
            
            $drops = [];
            
            foreach ($array['drops'] as $id => $keys){
                
                $item = explode(":", $id);
                $item = Item::get($item[0], $item[1], $keys['amount']);
                
                if(isset($keys['name']) AND $keys['name'] !== null)
                    $item->setCustomName($keys['name']);                
                if (empty($keys['chance']) OR mt_rand(1, 100) === intval($keys['chance'])) 
                    $drops[] = $item;
            }
            
            $event->setDrops($drops);
        }
    }
}
