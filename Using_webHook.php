<?Php 
/*
	We must create an script on https server then add script link to for example 
	https://api.telegram.org/bot112186325:tokenNumber/setWebhook?url=https://example.com/script.php
	then when a user type a command on your telegram bot,....then ,....
*/
// NOTE: you can pass 'true' as the second argument to decode as array

$result= json_decode(file_get_contents('php://input'), true);
error_log(print_r($result, 1), 3, '/path/to/logfile.log');

$user_id = $result['message']['from']['id'];
$text = $result['message']['text'];

// TODO: use something like strpos() or strcmp() for more flexibility
switch (true)
{
    case $text == '/hi':
        $text_reply = 'Hello';
        break;

    case $text == '/yourname':
        // TODO: use the getMe API call to get the bot information
        $text_reply = 'jJoe';
        break;

    default:
        $text_reply = 'not sure what you want?';
        break;
}

$token = '';
$url = 'https://api.telegram.org/bot'.tokenNumber.'/sendMessage?chat_id='.$user_id;
$url .= '&text=' .$text_reply;
$res = file_get_contents($url);  