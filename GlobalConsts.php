<?php
$input = file_get_contents('php://input');
$update = json_decode($input, true);
define('TOKEN', '798433117:AAFziZRwcRtaSDGuPWqX6MyiOSoaWWSgib8');
$API_URL = 'https://api.telegram.org/bot' . TOKEN . "/";

function infos($update)
{
    if (array_key_exists('message', $update)) {
        $message_id = $update['message']["id"];
        $username = array_key_exists('username', $update['message']['from']) ? $update['message']['from']['username'] : null;
        $first_name = $update['message']['from']['first_name'];
        $last_name = array_key_exists('last_name', $update['message']['from']) ? $update['message']['from']['last_name'] : null;
        $user_id = $update['message']['from']['id'];
        $chat_id = $update['message']['chat']['id'];
        $text = $update['message']['text'];
        $message_date = $update['message']['date'];
    } elseif (array_key_exists('callback_query', $update)) {
        $callback = $update['callback_query']['id'];
        $username = $update['callback_query']['from']['username'];
        $user_id = $update['callback_query']['from']['id'];
        $chat_id = $update['callback_query']['message']['chat']['id'];
        $message_id = $update['callback_query']['message']['message_id'];
        $first_name = $update['callback_query']['from']['first_name'];
        $text = $update['callback_query']['data'];
    } else {
        return "error on result";
    }
}
