<?php
namespace BoxOfDevs\WorldPainter ; 
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use poxketmine\utils\TextFormat as C;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
 use pocketmine\Player;


class Main extends PluginBase{
    
    
    
public function onEnable(){
// $this->getServer()->getPluginManager()->registerEvents($this, $this);
 }
 
 
 const Prefix = C::YELLOW . "[" . C::GOLD . "WorldPainter" . C::YELLOW . "] ";
 
 
 
 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
     switch($cmd->getName()){
         
         
         case "/wpwand":
         if($sender instanceof Player) {
             $sender->getInventory()->addItem(\pocketmine\Item::get($this->getConfig()->get("WandId")));
             $sender->sendMessage(self::Prefix . C::GREEN . "You got now the WorldPainter wand.");
         }
         break;
         
         
         
     }
     return false;
 }
}