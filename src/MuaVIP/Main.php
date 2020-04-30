<?php

namespace MuaVIP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\event\Listener;

use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\ModalForm;
use jojoe77777\FormAPI\CustomForm;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\inventory\Inventory;
use MuaVIP\Main;

class Main extends PluginBase implements Listener {
    
    public function onEnable() {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->point = $this->getServer()->getPluginManager()->getPlugin("PointAPI");
		
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getResource("config.yml");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool
    {
        switch($cmd->getName()){
        case "muavip":
        if(!($sender instanceof Player)){
        $sender->sendMessage("§cDont use here");
		return true;
		}
		$this->sendMainForm($sender);
		return true;
		}
	}
	public function sendMainForm($sender){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
            	    case 0:
                    $this->VipI($sender);
                    break;
                    case 1:
                    $this->VipII($sender);
                    break;
					case 2:
					$this->VipIII($sender);
					break;
					case 3:
					$this->VipIV($sender);
					break;
					case 4:
					$this->VipV($sender);
					break;
					case 5:
					$this->VipVI($sender);
					break;
					case 6:
					$this->VipVII($sender);
					break;
					case 7:
					break;
					
			}       
        });
     $money = $this->getServer()->getPluginManager()->getPlugin("PointAPI")->myPoint($sender);
     $exit = $this->getConfig()->get("Exit");
      $name = $this->getConfig()->get("VipI.Name");
      $name2 = $this->getConfig()->get("VipII.Name");
      $name3 = $this->getConfig()->get("VipIII.Name");
      $name4 = $this->getConfig()->get("VipIV.Name");
      $name5 = $this->getConfig()->get("VipV.Name");
      $name6 = $this->getConfig()->get("VipVI.Name");
      $name7 = $this->getConfig()->get("VipVII.Name");
      $gia = $this->getConfig()->get("VipI.Gia");
      $gia2 = $this->getConfig()->get("VipII.Gia");
      $gia3 = $this->getConfig()->get("VipIII.Gia");
      $gia4 = $this->getConfig()->get("VipIV.Gia");
      $gia5 = $this->getConfig()->get("VipV.Gia");
      $gia6 = $this->getConfig()->get("VipVI.Gia");
      $gia7 = $this->getConfig()->get("VipVII.Gia");
      $points = $this->getConfig()->get("Point");
      $content = $this->getConfig()->get("Content");
      $form->setTitle($this->getConfig()->get("Title.Vip"));
      $form->setContent("§l§c↣§b ".$points."§7:§e ".$money."\n".$content);
      $form->addButton("§l§f•§9 ".$name."§c ↣§6 ".$gia." §a".$points."§f •",0,"textures/ui/filledStarFocus");
      $form->addButton("§l§f•§9 ".$name2."§c ↣§6 ".$gia2." §a".$points."§f •",0,"textures/ui/filledStar");
	  $form->addButton("§l§f•§9 ".$name3."§c ↣§6 ".$gia3." §a".$points."§f •",0,"textures/ui/permissions_member_star");
	  $form->addButton("§l§f•§9 ".$name4."§c ↣§6 ".$gia4." §a".$points."§f •",0,"textures/ui/permissions_member_star_hover");
	  $form->addButton("§l§f•§9 ".$name5."§c ↣§6 ".$gia5." §a".$points."§f •",0,"textures/ui/op");
	  $form->addButton("§l§f•§9 ".$name6."§c ↣§6 ".$gia6." §a".$points."§f •",0,"textures/ui/permissions_op_crown_hover");
	  $form->addButton("§l§f•§9 ".$name7."§c ↣§6 ".$gia7." §a".$points."§f •",0,"textures/ui/glowing_effect");
	  $form->addButton($this->getConfig()->get("Exit"),0,"textures/ui/cancel");
      $form->sendToPlayer($sender);
	} #Rank 1
	public function VipI($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
			case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipI.Name");
            $rank = $this->getConfig()->get("VipI.Rank");
            $ngay = $this->getConfig()->get("VipI.Ngay");
            $gia = $this->getConfig()->get("VipI.Gia");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessI");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e ".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipI.Name");
        $rank = $this->getConfig()->get("VipI.Rank");
        $ngay = $this->getConfig()->get("VipI.Ngay");
        $gia = $this->getConfig()->get("VipI.Gia");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§c1§7. Bay (/fly)\n§c2§7. Dịch chuyển (/tp)\n§l§f→ §r§aBạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
    } #Rank 2
	public function VipII($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
			case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipII.Name");
            $rank = $this->getConfig()->get("VipII.Rank");
            $ngay = $this->getConfig()->get("VipII.Ngay");
            $gia = $this->getConfig()->get("VipII.Gia");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessII");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipII.Name");
        $rank = $this->getConfig()->get("VipII.Rank");
        $ngay = $this->getConfig()->get("VipII.Ngay");
        $gia = $this->getConfig()->get("VipII.Gia");
        $vipi = $this->getConfig()->get("VipI.Rank");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§aCó Tất Cả Quyền §d".$vipi."\n§c1§7. Cánh engle+devil siêu đẹp (/wing)\n§c2§7. Hồi đầy máu (/heal)\n§l§f→ §r§aBạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
    } #Rank 3
	public function VipIII($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
			case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipIII.Name");
            $rank = $this->getConfig()->get("VipIII.Rank");
            $ngay = $this->getConfig()->get("VipIII.Ngay");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessIII");
            $gia = $this->getConfig()->get("VipIII.Gia");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipIII.Name");
        $rank = $this->getConfig()->get("VipIII.Rank");
        $ngay = $this->getConfig()->get("VipIII.Ngay");
        $gia = $this->getConfig()->get("VipIII.Gia");
        $vipii = $this->getConfig()->get("VipII.Rank");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§eCó Tất Cả Quyền §d".$vipii."\n§c1§7. Thay đổi tên (/nick)\n§c2§7. kích thước (/size)\n§l§f→ §r§aBạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
	}
	public function VipIV($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
			case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipIV.Name");
            $rank = $this->getConfig()->get("VipIV.Rank");
            $ngay = $this->getConfig()->get("VipIV.Ngay");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessIV");
            $gia = $this->getConfig()->get("VipIV.Gia");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipIV.Name");
        $rank = $this->getConfig()->get("VipIV.Rank");
        $ngay = $this->getConfig()->get("VipIV.Ngay");
        $gia = $this->getConfig()->get("VipIV.Gia");
        $vipii = $this->getConfig()->get("VipIII.Rank");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§eCó Tất Cả Quyền §d".$vipiii."\n§c1§7. áo choàng (/cape)\n§c2§7. Ba lô di động (/backpack)\n§c3§7. Hiệu Mủi Tên (/arrowtrails)\n§l§f→§r §aBạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
	}
	public function VipV($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
			case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipV.Name");
            $rank = $this->getConfig()->get("VipV.Rank");
            $ngay = $this->getConfig()->get("VipV.Ngay");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessV");
            $gia = $this->getConfig()->get("VipV.Gia");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipV.Name");
        $rank = $this->getConfig()->get("VipV.Rank");
        $ngay = $this->getConfig()->get("VipV.Ngay");
        $gia = $this->getConfig()->get("VipV.Gia");
        $vipiv = $this->getConfig()->get("VipIV.Rank");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§eCó Tất Cả Quyền §d".$vipiv."\n§c1§7. Hiệu ứng (/hieuungui)\n§l§f→§r §aBạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
	}
	public function VipVI($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
		    case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipVI.Name");
            $rank = $this->getConfig()->get("VipVI.Rank");
            $ngay = $this->getConfig()->get("VipVI.Ngay");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessVI");
            $gia = $this->getConfig()->get("VipVI.Gia");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipVI.Name");
        $rank = $this->getConfig()->get("VipVI.Rank");
        $ngay = $this->getConfig()->get("VipVI.Ngay");
        $gia = $this->getConfig()->get("VipVI.Gia");
        $vipv = $this->getConfig()->get("VipV.Rank");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§eCó Tất Cả Quyền §d".$vipv."\n§c1§7. Menu dành cho Vip (/vipui)\n§c2§7. time/weather (/time, /weather)\n§c3§7. sử dụng loa (/say)\n§l§f→§r§a Bạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
	}
	public function VipVII($sender){
        $api = $this->getserver()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
			break;
			case 1:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
            case 2:
            $coins = $this->point->myPoint($sender);
            $p = $sender->getName();
            $name = $this->getConfig()->get("VipVII.Name");
            $rank = $this->getConfig()->get("VipVII.Rank");
            $ngay = $this->getConfig()->get("VipVII.Ngay");
            $gia = $this->getConfig()->get("VipVII.Gia");
            $prefix = $this->getConfig()->get("Prefix");
            $mesagefail = $this->getConfig()->get("MessageFail");
            $messagesuccess = $this->getConfig()->get("MessageSuccessVII");
            $points = $this->getConfig()->get("Point");
            if($coins >= $gia){
            $this->point->reducePoint($sender, $gia);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setvip ".$p." ".$rank." ".$ngay);
            $this->getServer()->broadcastMessage("§l§c".$prefix."§r ↣§e".$p." ".$messagesuccess);
            return true;
            }else{
            $sender->sendMessage("§l§c".$prefix."§r ↣ ".$mesagefail);
            }
            break;
            }
        });
        $name = $this->getConfig()->get("VipVII.Name");
        $rank = $this->getConfig()->get("VipVII.Rank");
        $ngay = $this->getConfig()->get("VipVII.Ngay");
        $gia = $this->getConfig()->get("VipVII.Gia");
        $vipvi = $this->getConfig()->get("VipVI.Rank");
        $points = $this->getConfig()->get("Point");
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent("§l§bQuyền §c".$name."§f:\n§r§eCó Tất Cả Quyền §d".$vipvi."\n§c1§7. Gamemode c/s (/vip <gmc/gms>)\n§c2§7. kick (/kick)\n§c3§7. lấy item (/give)§l§f→§r §aBạn có muốn mua §e".$name." §f(§a".$gia." §c".$points."§f) = §f(§6".$ngay." ngày§f)?");
        $form->addButton($this->getConfig()->get("KhongMuaVip"),0,"textures/ui/cancel");
        $form->addButton($this->getConfig()->get("QuayLaiShop"),0,"textures/ui/import");
        $form->addButton($this->getConfig()->get("MuaVip"),0,"textures/ui/confirm");
        $form->sendToPlayer($sender);
	}
	public function NoHavePoint($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
			case 1:
			break;
			}
		});
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent($this->getConfig()->get("ContentFail"));
		$form->addButton($this->getConfig()->get("QuayLaiShop", 0));
		$form->addButton($this->getConfig()->get("ThoatShop", 1));
    }
	public function HavePoint($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
			case 0:
	        $cmd = "muavip";
			$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
			break;
			case 1:
			break;
			}
		});
        $form->setTitle($this->getConfig()->get("Title.Vip"));
		$form->setContent($this->getConfig()->get("ContentSuccess"));
		$form->addButton($this->getConfig()->get("QuayLaiShop", 0));
        $form->addButton($this->getConfig()->get("ThoatShop", 1));
	}
}
			
		