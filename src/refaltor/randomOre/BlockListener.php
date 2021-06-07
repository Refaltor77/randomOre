<?php

namespace refaltor\randomOre;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;

class BlockListener implements Listener
{
    public randomOre $plugin;

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
                if (isset($array['chance'])){
                    if (mt_rand(1, $array['chance']) === 1){
                        $item = Item::get($item[0], $item[1], $array['amount']);
                        if (isset($array['name']) && $array['name'] !== null) $item->setCustomName($array['name']);
                        $event->setDrops([$item]);
                    }
                }else {
                   $item = Item::get($item[0], $item[1], $array['amount']);
                   if (isset($array['name']) && $array['name'] !== null) $item->setCustomName($array['name']);
                   $event->setDrops([$item]);
                }
            }
        }
    }
}