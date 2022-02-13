<?php
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . get_settings_data('API')['value'] . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
function query($sorov){
    global $connection;

    return mysqli_query($connection,$sorov);
}

function confirm($sorov){
    global $connection;
    if (!$sorov) {
        die("Query failed - " .mysqli_error($connection)." ".$connection->error);
    }
}
function fetch_array($var){
    return mysqli_fetch_array($var);
}
function get_t_user_data(){
    $code = query("SELECT * FROM users");
    confirm($code);

    return mysqli_num_rows($code);
}
function get_settings_data($param){
    $code = query("SELECT * FROM settings WHERE parameter = '{$param}'");
    confirm($code);

    $row = fetch_array($code);
    return $row;
}
function save_api(){
    if (isset($_POST["submit_api"])) {
           $api = trim(htmlspecialchars($_POST['api_key']));
           $code = query("UPDATE settings SET value = '{$api}' WHERE parameter = 'API'");

           confirm($code);
           echo "Api yangilandi";
    }
}
function sendMessage($arr){

   bot('sendMessage', [
        'chat_id' => $arr['chat_id'],
        'text' => $arr['text']
    ]);
}
function send_message(){
    if (isset($_POST["submit_message"])) {
        $message = trim(htmlspecialchars($_POST['message']));
        $code = query("SELECT * FROM users");
        confirm($code);

        while ($row = fetch_array($code)) {
            sendMessage([
                'chat_id' => $row['chat_id'],
                'text' => $message
            ]);
        }
        
           echo "Habar yuborildi";
    }
}
function set_data($data){

    $code = query("INSERT INTO users(first_name,last_name,chat_id,lang) VALUES('{$data["first_name"]}','{$data["last_name"]}','{$data["chat_id"]}','en');");
    confirm($code,$data["chat_id"]);

    return true;
}
function check_username($first_name){
    $code = query("SELECT * FROM users WHERE first_name = '{$first_name}'");
    confirm($code);

    if(mysqli_num_rows($code) == 0) 
    return false; 
    else
    return true;
}
function getlang($first_name){
    $code = query("SELECT * FROM users WHERE first_name = '{$first_name}'");
    confirm($code);

    return fetch_array($code)["lang"];
}

function setlang($data){
    $code = query("UPDATE  users SET lang = '{$data["lang"]}' WHERE chat_id = {$data["chat_id"]}");

    confirm($code, $data["chat_id"]);
}


?>

