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
    $this->mode = [];
// $this->getServer()->getPluginManager()->registerEvents($this, $this);
 }
 
 
 define("Prefix", C::YELLOW . "[" . C::GOLD . "WorldPainter" . C::YELLOW . "] ", true);
 define("M_PLACE", "PlayerModePlace");
 define("M_REPLACE", "PlayerModeReplace");
 define("CG", C::GREEN); // Green color shortcut
 define("CR", C::RED); // Red color shortcut
 define("CY", C::YELLOW); // Yellow color shortcut
 define("CO", C::GOLD); // Orange color shortcut
 
 
 public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
     switch($cmd->getName()){
         
         
         
         case "/wpwand": // This will be used to detect when does the player wants to use the wand
         if($sender instanceof Player) {
             $sender->getInventory()->addItem(\pocketmine\Item::get($this->getConfig()->get("WandId")));
             $sender->sendMessage(Prefix . CG . "You got now the WorldPainter wand.");
         }
         break;
         
         
         
         case "/mode": // To change between replacing and placing
         if($sender instanceof Player and isset($args[0])) {
             switch(strtolower($args[0])) {
                 case "place": // Entering in place mode
                 $this->modes[$sender->getName()] = M_PLACE;
                 $sender->sendMessage(PREFIX . CG . "You have succefully entered in Place mode")
                 break;
                 case "place": // Entering in replace mode
                 $this->modes[$sender->getName()] = M_REPLACE;
                 break;
             }
         }
         break;
         
         
         
         
     }
     return false;
 }
}