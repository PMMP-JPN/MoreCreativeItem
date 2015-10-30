<?php
namespace mci;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\utils\Config;

class mci extends PluginBase implements Listener{
	public function onEnable(){
  	$this->getServer()->getPluginManager()->registerEvents($this,$this);
	
	if(!file_exists($this->getDataFolder() . "config.yml")){
		$this->conf = new config($this->getDataFolder() . "config.yml", config::YAML, array(
			"itemid(maybe you cant use metadata)"=> null,
			"itemid" => array(51,127,184,185,186,187,198,246,276,289,330,341,346,403,302),
			));
		}else{
			$this->conf = new config($this->getDataFolder() . "config.yml", config::YAML, array());
		}	
	
	foreach($this->conf->get("itemid") as $id){
		Item::addCreativeItem (new Item($id));
	}
}
}
