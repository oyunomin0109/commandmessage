<?php

namespace oyunomin\helloworld;

use pocketmine\{Player,Server};
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getLogger()->info("helloworld");
    }
}