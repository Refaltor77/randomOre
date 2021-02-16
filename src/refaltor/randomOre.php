<?php
namespace refaltor;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use refaltor\utils\blockListener;

class randomOre extends PluginBase {

    /**
     * @var randomOre
     */
    private static randomOre $instance;

    public function onEnable()
    {
        self::$instance = $this;
        $this->saveDefaultConfig();
        $id = $this->getConfig()->get("ID-randomOre");
        $meta = $this->getConfig()->get("META-randomOre");
        Server::getInstance()->getLogger()->info("randomOre setup : '$id:$meta'");
        Server::getInstance()->getPluginManager()->registerEvents(new blockListener(), $this);
    }

    public static function getInstance(): randomOre
    {
        return self::$instance;
    }
}