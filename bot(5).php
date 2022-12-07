<?php
error_reporting(0);
if (!file_exists("_group.txt")) {
  $g = readline("group id : ");
  file_put_contents("_group.txt", $g);
}
if (!file_exists("_ad.txt")) {
  file_put_contents("_ad.txt", "");
}
if (!file_exists("_ch.txt")) {
  file_put_contents("_ch.txt", "@uuunr");
}
if (!file_exists("_users.txt")) {
  file_put_contents("_users.txt", "uuunr");
}
if (!file_exists("_name.txt")) {
  file_put_contents("_name.txt", "uuunr");
}
if (!file_exists("_about.txt")) {
  file_put_contents("_about.txt", "@uuunr");
}
if (!file_exists("_type.txt")) {
  file_put_contents("_type.txt", "c");
}
if (!file_exists("_token.txt")) {
  $g = readline("token : ");
  file_put_contents("_token.txt", $g);
}
function bot($method, $datas = []) {
  $token = file_get_contents("_token.txt");
  $url = "https://api.telegram.org/bot$token/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $res = curl_exec($ch);
  curl_close($ch);
  return json_decode($res, true);
  echo json_encode($res, true);
}
function getupdates($up_id) {
  $get = bot('getupdates', ['offset' => $up_id]);
  return end($get['result']);
}
$botuser = "@" . bot('getme', ['bot']) ["result"]["username"];
file_put_contents("_ad.txt", $botuser);
function ph($ph, $cc) {
  bot('sendMessage', ['chat_id' => $cc, 'text' => "login ..."]);
  if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
  }
  define('MADELINE_BRANCH', 'deprecated');
  include 'madeline.php';
  unlink("mdddd.madeline");
  unlink("mdddd.madeline.lock");
  $settings['app_info']['api_id'] = 579315;
  $settings['app_info']['api_hash'] = '4ace69ed2f78cec268dc7483fd3d3424';
  $MadelineProto = new \danog\MadelineProto\API('mdddd.madeline', $settings);
  try {
    $vv = $MadelineProto->phone_login($ph);
    echo json_encode($vv);
    bot('sendMessage', ['chat_id' => $cc, 'text' => "Now send me the code like this : \n /co code"]);
  }
  catch(Exception $e) {
    bot('sendMessage', ['chat_id' => $cc, 'text' => "I can't login to account"]);
    return false;
  }
  while (1) {
    echo "hi";
    $last_up = $last_up;
    $get_up = getupdates($last_up + 1);
    $last_up = $get_up['update_id'];
    $message = $get_up['message'];
    $userID = $message['from']['id'];
    $chat_id = $message['chat']['id'];
    $text = $message['text'];
    if ($text) {
      if (preg_match("/\/co (.*)/", $text)) {
        $code = explode(" ", $text) [1];
        try {
          if ($code != "") {
            $value = $MadelineProto->complete_phone_login(intval($code));
            echo json_encode($value);
            bot('sendMessage', ['chat_id' => $cc, 'text' => "done login now send /run"]);
            break;
          }
        }
        catch(Exception $e) {
          echo $e->getMessage();
          bot('sendMessage', ['chat_id' => $cc, 'text' => "Error" . $e->getMessage() ]);
        }
      }
    }
    sleep(1);
  }
}
function random($one, $t) {
  $out = "";
  $randomx = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
  $randomxx = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
  if ($t == "@") {
    for ($i = 0;$i < count($randomx);$i++) {
      $two = $randomx[$i];
      $out = $out . "@" . $one . $two . $two . $two . $two . "\n";
    }
    return $out;
  }
  elseif ($t == "b") {
    for ($i = 0;$i < count($randomx);$i++) {
      $two = $randomx[$i];
      $out = $out . $one . $two . $two . $two . $two . "\n";
    }
    return $out;
  }
  elseif ($t == "zx") {
    $ex = explode("-", $one);
    $o = $ex[0];
    $t = $ex[1];
    $out = $out . "@" . $o . $t . $t . $t . $t . "\n";
    $out = $out . "@" . $t . $o . $t . $t . $t . "\n";
    $out = $out . "@" . $t . $t . $o . $t . $t . "\n";
    $out = $out . "@" . $t . $t . $t . $o . $t . "\n";
    $out = $out . "@" . $t . $t . $t . $t . $o . "\n";
    $out = $out . "@" . $t . $o . $o . $o . $o . "\n";
    $out = $out . "@" . $o . $t . $o . $o . $o . "\n";
    $out = $out . "@" . $o . $o . $t . $o . $o . "\n";
    $out = $out . "@" . $o . $o . $o . $t . $o . "\n";
    $out = $out . "@" . $o . $o . $o . $o . $t . "\n";
    return $out;
  }
  elseif ($t == "*") {
    if (!preg_match("/^=/", $one)) {
      for ($i = 0;$i < count($randomx);$i++) {
        $two = $randomx[$i];
        $st = str_replace("=", $two, $one);
        $out = $out . "@" . $st . "\n";
      }
      return $out;
    }
    else {
      for ($i = 0;$i < count($randomxx);$i++) {
        $two = $randomxx[$i];
        $st = str_replace("=", $two, $one);
        $out = $out . "@" . $st . "\n";
      }
      return $out;
    }
  }
  elseif (preg_match("/list/", $t)) {
    $b = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $o = explode("--", $t) [1];
    for ($y = 0;$y < count($b);$y++) {
      $n = $b[$y];
      print ($o . "-----" . $n . "\n");
      $out = $out . "@" . $o . $n . $n . $n . $n . "\n";
      $out = $out . "@" . $n . $o . $n . $n . $n . "\n";
      $out = $out . "@" . $n . $n . $o . $n . $n . "\n";
      $out = $out . "@" . $n . $n . $n . $o . $n . "\n";
      $out = $out . "@" . $n . $n . $n . $n . $o . "\n";
    }
    return $out;
  }
  elseif (preg_match("/nlis/", $t)) {
    $b = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $o = explode("--", $t) [1];
    for ($y = 0;$y < count($b);$y++) {
      $n = $b[$y];
      print ($o . "-----" . $n . "\n");
      $out = $out . $n . $o . $n . $n . $n . "\n";
      $out = $out . $n . $n . $o . $n . $n . "\n";
      $out = $out . $n . $n . $n . $o . $n . "\n";
      $out = $out . $n . $n . $n . $n . $o . "\n";
    }
    return $out;
  }
}
function countUsers($u = "2", $t = "2") {
  $users = explode("\n", file_get_contents("_users.txt"));
  $list = "";
  $i = 1;
  foreach ($users as $user) {
    if ($user != "") {
      $list = $list . "\n$i - @$user";
      $i++;
    }
  }
  if ($list == "") {
    return "no Users";
  }
  else {
    return $list;
  }
  if ($t = "1") {
    $users = explode("\n", $u);
    $list = "";
    $i = 1;
    foreach ($users as $user) {
      if ($user != "") {
        $list = $list . "\n$i - @$user";
        $i++;
      }
    }
    if ($list == "") {
      return "no Users";
    }
    else {
      return $list;
    }
  }
}
function stats($nn){
	$st = "";
	$x = shell_exec("pm2 show $nn");
	if (preg_match("/online/", $x)) {
		$st = "run";
	}else{
		$st = "stop";
	}
	return $st;
}
function run($update) {
  $nn = bot('getme', ['bot']) ["result"]["username"];
  $message = $update['message'];
  $userID = $message['from']['id'];
  $chat_id = $message['chat']['id'];
  $text = $message['text'];
  $date = $update['callback_query']['data'];
  $group = file_get_contents("_group.txt");
  if (preg_match("/\/send (.*)/", $text)) {
    $f = str_replace("/send ", "", $text);
    bot('sendMessage', ['chat_id' => $group, 'text' => $f]);
  }
  if ($chat_id == $group) {
    $users = explode("\n", file_get_contents("_users.txt"));
    if (preg_match("/\/pin @(.*)/", $text)) {
      $user = explode("@", $text) [1];
      if (!in_array($user, $users)) {
        file_put_contents("_users.txt", "\n" . $user, FILE_APPEND);
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done pin on @$user"]);
      }
      else {
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "The user exists @$user"]);
      }
    }
    if (preg_match("/\/st (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_type.txt", $t);
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the type to $t"]);
    }
    if (preg_match("/\/add(.*)/", $text)) {
      $ex = str_replace(["/add\n", "/add \n"], "", $text);
      $ex = explode("\n", $ex);
      $userT = "";
      $userN = "";
      foreach ($ex as $u) {
        $users = explode("\n", file_get_contents("_users.txt"));
        $user = explode("@", $u) [1];
        if (!in_array($user, $users)) {
          $userT = $userT . "\n" . $user;
        }
        else {
          $userN = $userN . "\n" . $user;
        }
      }
      file_put_contents("_users.txt", $userT, FILE_APPEND);
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done pin on :\n" . countUsers($userT, "1") ]);
    }
    if (preg_match("/\/unpin @(.*)/", $text)) {
      $user = explode("@", $text) [1];
      if (in_array($user, $users)) {
        $data = str_replace("\n" . $user, "", file_get_contents("_users.txt"));
        file_put_contents("_users.txt", $data);
        bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done unpin on @$user"]);
      }
    }
    if (preg_match("/\/list (.*)/", $text)) {
      if (preg_match("/-/", $text)) {
        $d = str_replace("/list ", "", $text);
        $x = random($d, "zx");
        bot('sendMessage', ['chat_id' => $group, 'text' => $x, ]);
      }
      elseif (!preg_match("/-/", $text) && !preg_match("/_/", $text)) {
        $d = str_replace("/list ", "", $text);
        echo $d;
        $x = random($d, "@");
        bot('sendMessage', ['chat_id' => $group, 'text' => $x, ]);
      }
      elseif (preg_match("/=/", $text)) {
        $d = str_replace("/list ", "", $text);
        echo $d;
        $x = random($d, "*");
        bot('sendMessage', ['chat_id' => $group, 'text' => $x, ]);
      }
    }
    if (preg_match("/\/upall/", $text)) {
      file_put_contents("_users.txt", "");
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done delete all"]);
    }
    if (preg_match("/\/users/", $text)) {
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "users; \n " . countUsers() ]);
    }
    if (preg_match("/\/info/", $text)) {
      $t = file_get_contents("_type.txt");
      $n = file_get_contents("_name.txt");
      $a = file_get_contents("_about.txt");
      $c = file_get_contents("_ch.txt");
      $st = stats($nn);
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "checker stats : $st\ntype (/st) : $t\nchannel name (/sn) : $n\nchanne about (/sa) : $a\nmsg rights (/sm) : $c"]);
    }
    if (preg_match("/\/start/", $text)) {
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "💯| /info -> لعرض حاله التشيكر ,
🔔| /run - تشغيل التشيكر,
🔕| /stop - اطفاء التشيكر ,
♻️| /ph +964*** - تسجيل رقم الهاتف ,
⚒| /add - اضافه لسته  ,
📜| /users -  لاضهار السته ,  
❌| /upall - لمسح السته  ,
⭕️| /unpin - لحذف معرف من السته ,
🔰| /st  - [تحديد الصيد [قناه/حساب ( a / c),
————————————————————
• @uuunr | @ThisIsMuslim #!"]);
    }
    if (preg_match("/\/sn (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_name.txt", $t);
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the name to $t"]);
    }
    if (preg_match("/\/sa (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_about.txt", $t);
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the about to $t"]);
    }
    if (preg_match("/\/sm (.*)/", $text)) {
      $t = explode(" ", $text) [1];
      file_put_contents("_ch.txt", $t);
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "done change the msg to $t"]);
    }
    if (preg_match("/\/ph /", $text)) {
      exec("pm2 stop $nn");
      $ph = explode(" ", $text) [1];
      ph($ph, $chat_id);
    }
    if (preg_match("/\/run/", $text)) {
      exec("pm2 stop $nn");
      exec("pm2 start checker.php --name $nn");
    }
    if (preg_match("/\/stop/", $text)) {
      exec("pm2 stop $nn");
      bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Done stop the checker"]);
    }
  }
}
while (true) {
  $last_up = $last_up;
  $get_up = getupdates($last_up + 1);
  $last_up = $get_up['update_id'];
  run($get_up);
  sleep(1);
}

