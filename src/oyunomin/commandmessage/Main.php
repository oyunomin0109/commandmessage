<?php
namespace oyunomin\commandmessage; //このファイルのパスを書くよ
//使うもののパスを書くよ
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\{Command,CommandSender}; //コマンド関連を扱う場合はこれを使うよ

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this -> getServer() -> getPluginManager() -> registerEvents($this,$this); //eventListener(イベント呼び出しに使う)にこのクラスを指定するよ。この場合はMainを指定してることになるよ
    }
    //$senderにはコマンドを打った人、$commandにはcommand,$labelにはコマンドの/?の?の部分、$argsには/? a bのaとbの部分が配列としてはいるよ。$args[0]にはa、$args[1]にはbが入るよ。
    public function onCommand(CommandSender $sender,Command $command,string $label,array $args):bool {
        if(!$sender instanceOf Player) { //$sender(コマンドを打った人)がプレイヤーかどうかを判断するよ。!付けた場合はプレイヤーではないってことになるよ
            $sender -> sendMessage('ゲーム内で実行してください'); //コマンドを打った人に"ゲーム内で実行してください"と送るよ。
            return true; //trueを返して処理終了だよ。これをしないとエラーを吐くよ
        }
        $player = $sender ->getPlayer(); //プレイヤーを取得するよ
        $name = $player ->getName(); //送信者の名前を取得する
        $sender -> sendMessage("こんにちは".$sender."さん");//送り主に"こんにちは、(player名)さん"と送るよ。
        return true; //trueを返して処理終了だよ。これをしないとエラーを吐くよ
        
        //コマンドが一つの場合はif($label === "message")などは要りません。
    }
}
