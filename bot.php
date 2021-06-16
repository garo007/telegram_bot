<?php
include('vendor/autoload.php');
include('menu.php');
include('settings.php');
include('bot_lib.php');
use Telegram\Bot\Api;
	$telegram = new Api('1544186452:AAHZn-PbzR_K5N1uhoB0muZSOfnqlWZeGzk');
	$result = $telegram->getWebhookUpdates();

	$text = $result["message"]["text"];
	$chat_id = $result["message"]["chat"]["id"];
	$name = $result["message"]["from"]["username"];
	$first_name = $result["message"]["from"]["first_name"];
	$last_name = $result["message"]["from"]["last_name"];
	$get_user = get_user($connect, $chat_id);
	$old_id = $get_user['chat_id'];
	$username = $first_name." ".$last_name;

	if($text == "/start"){
        $reply = "Menu: ".$name." sdasd";
        $reply_markup = $telegram->replyKeyboardMarkup(['keyboard'=>$menu, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
        $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
	}elseif($text == "Barev"){
	    $reply = "Barev ".$first_name." ".$last_name;
        $reply_markup = $telegram->replyKeyboardMarkup(['keyboard'=>$menu, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
        $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
	}elseif($text == "knopka 2"){
	    $reply = $first_name." ".$last_name." sa knopka 2-n e";
        $reply_markup = $telegram->replyKeyboardMarkup(['keyboard'=>$menu2, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
        $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup]);
	}




	add_user($connect, $username, $chat_id, $name, $old_id);
	
?>