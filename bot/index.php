<?php

require_once "vendor/autoload.php";

use Stichoza\GoogleTranslate\GoogleTranslate;
@include "../main/db.php";

$update = file_get_contents('php://input');
$update = json_decode($update,true);
$message = $update["message"] ? $update["message"] : null;

$chat_id = $message["from"]["id"] ? $message["from"]["id"] : null;
$cid = $message["chat"]["id"] ? $message["chat"]["id"] : null;
$text = $message["text"] ? $message["text"] : null;

$first_name = $message["from"]["first_name"] ? $message["from"]["first_name"] : null;
$last_name = $message["from"]["last_name"] ? $message["from"]["last_name"] : null;

    try{
        if (!check_username($first_name)) {
            $data["first_name"] = $first_name;
            $data["last_name"] = $last_name;
            $data["chat_id"] = $chat_id;

            set_data($data);
        }

        if ($text[0] !== "/") {

            $lang = getlang($chat_id);

                $tr = new GoogleTranslate();
                
                if ($lang == "ru") 
                {
                    $tr->setSource('uz');
                    $tr->setTarget('ru');
                }
                elseif ($lang == "uz") 
                {
                    $tr->setSource('ru');
                    $tr->setTarget('uz');
                }
                elseif ($lang == "enuz")
                {
                    $tr->setSource('en');
                    $tr->setTarget('uz');
                }
                elseif ($lang == "uzen") 
                {
                    $tr->setSource('uz');
                    $tr->setTarget('en');
                }
                elseif ($lang == "uzb") 
                {
                    $tr->setSource();
                    $tr->setTarget('uz');
                }
                $tarjima = $tr->translate($text);

                bot("sendMessage", [
                    "chat_id" => $chat_id,
                    "text" => $tarjima
                ]);
        }else {
            switch ($text) {
                case '/start':{
                    bot("sendMessage", [
                    "chat_id" => $chat_id,
                    "text" => "Assalomu alekum, Tarjima ishlarini boshlashingiz mumkin\n\n/uzru - O'zbek tilidan Rus tiliga\n/ruuz - Rus tilidan O'zbek tiliga\n/uzen - O'zbek tilidan Ingliz tiliga\n/enuz - Ingliz tilidan O'zbek tiliga\n/uzbek - Barcha tildan o'zbek tiliga"
                    ]);
                    break;
                }//end Start
                case '/uzru':{
                    $data["chat_id"] = $chat_id;
                    $data["lang"] = 'ru'; //uzbekchadan ruschaga

                    setlang($data);

                    bot("sendMessage", [
                        "chat_id" => $chat_id,
                        "text" => "🇺🇿 <b>UZ / RU</b> 🇷🇺\nTarjima qilmoqchi bo'lgan matningizni kiriting\n\n/ruuz - Rus tilidan O'zbek tiliga\n/uzen - O'zbek tilidan Ingliz tiliga\n/enuz - Ingliz tilidan O'zbek tiliga",
                        "parse_mode" => "HTML"
                    ]);
                    break;
                }
                case '/ruuz':{
                    $data["chat_id"] = $chat_id;
                    $data["lang"] = 'uz'; // ruschadan uzbekchaga
                    setlang($data);

                    bot("sendMessage", [
                        "chat_id" => $chat_id,
                        "text" => "🇷🇺 <b>RU / UZ</b> 🇺🇿\nTarjima qilmoqchi bo'lgan matningizni kiriting\n\n/uzru - O'zbek tilidan Rus tiliga\n/uzen - O'zbek tilidan Ingliz tiliga\n/enuz - Ingliz tilidan O'zbek tiliga",
                        "parse_mode" => "HTML"
                    ]);
                    break;
                }
                case '/uzen':{
                    $data["chat_id"] = $chat_id;
                    $data["lang"] = 'uzen'; // ozbek -> ingliz
                    setlang($data);

                    bot("sendMessage", [
                        "chat_id" => $chat_id,
                        "text" => "🇺🇿 <b>UZ / EN</b> 🏴󠁧󠁢󠁥󠁮󠁧󠁿\nTarjima qilmoqchi bo'lgan matningizni kiriting\n\n/uzru - O'zbek tilidan Rus tiliga\n/ruuz - Rus tilidan O'zbek tiliga\n/enuz - Ingliz tilidan O'zbek tiliga",
                        "parse_mode" => "HTML"
                    ]);
                    break;
                }
                case '/enuz':{
                    $data["chat_id"] = $chat_id;
                    $data["lang"] = 'enuz'; // ingliz -> ozbek
                    setlang($data);

                    bot("sendMessage", [
                        "chat_id" => $chat_id,
                        "text" => "🏴󠁧󠁢󠁥󠁮󠁧󠁿 <b>EN / UZ</b> 🇺🇿\nTarjima qilmoqchi bo'lgan matningizni kiriting\n\n/uzru - O'zbek tilidan Rus tiliga\n/ruuz - Rus tilidan O'zbek tiliga\n/uzen - O'zbek tilidan Ingliz tiliga",
                        "parse_mode" => "HTML"
                    ]);
                    break;
                }
                case '/uzbek':{
                    $data["chat_id"] = $chat_id;
                    $data["lang"] = 'uzb'; // Istalgan tildan o'zbek tiliga
                    setlang($data);

                    bot("sendMessage", [
                        "chat_id" => $chat_id,
                        "text" => "🇺🇿 <b>Barcha tildan / O'zbek tiliga </b>\nTarjima qilmoqchi bo'lgan matningizni kiriting\n\n/uzru - O'zbek tilidan Rus tiliga\n/ruuz - Rus tilidan O'zbek tiliga\n/uzen - O'zbek tilidan Ingliz tiliga\n/enuz - Ingliz tilidan O'zbek tiliga",
                        "parse_mode" => "HTML"
                    ]);
                    break;
                }
                
            } //end Switch
        }//end Else



    }catch(Exception $exception){
        bot("sendMessage", [
            "chat_id" => $chat_id,
            "text" => $exception->getMessage()
        ]);
    }

?>
