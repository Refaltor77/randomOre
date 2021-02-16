<?php
namespace refaltor\utils;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use refaltor\randomOre;

class blockListener implements Listener
{
    public function onBreak(BlockBreakEvent $breakEvent)
    {
        $block = $breakEvent->getBlock();
        $config = randomOre::getInstance()->getConfig();
        if ($block->getId() === $config->get("ID-randomOre") and $block->getDamage() === $config->get("META-randomOre")){
            switch (mt_rand(1, 7)){
                case 1:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-1"), $config->get("META-drop-1"), $config->get("Number-drop-1"))]);
                    break;
                case 2:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-2"), $config->get("META-drop-2"), $config->get("Number-drop-2"))]);
                    break;
                case 3:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-3"), $config->get("META-drop-3"), $config->get("Number-drop-3"))]);
                    break;
                case 4:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-4"), $config->get("META-drop-4"), $config->get("Number-drop-4"))]);
                    break;
                case 5:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-5"), $config->get("META-drop-5"), $config->get("Number-drop-5"))]);
                    break;
                case 6:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-6"), $config->get("META-drop-6"), $config->get("Number-drop-6"))]);
                    break;
                case 7:
                    $breakEvent->setDrops([Item::get($config->get("ID-drop-7"), $config->get("META-drop-7"), $config->get("Number-drop-7"))]);
                    break;
            }
        }
    }
}