<?php
date_default_timezone_set("Asia/Baghdad");

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
define('MADELINE_BRANCH', 'deprecated');
include 'madeline.php';


function Channel(){
    
$settings['app_info']['api_id'] = 579315;
$settings['app_info']['api_hash'] = '4ace69ed2f78cec268dc7483fd3d3424';
$MadelineProto = new \danog\MadelineProto\API('mdddd.madeline', $settings);
$MadelineProto->start();

$MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => "/send checker start run | type - channel"]);


$updates = $MadelineProto->channels->createChannel(['broadcast' => true,'megagroup' => false,'title' => file_get_contents("_name.txt"), ]);
$chat_mack = $updates['updates'][1];
$i = 0;
while(1){
    $users = explode("\n",file_get_contents("_users.txt"));
    foreach($users as $user){
        if($user != ""){
            try{
            	$MadelineProto->messages->getPeerDialogs(['peers' => [$user]]);
            	echo "Loop : ".$i++." | Time : ".date("s")." | User : $user\n";
            } catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
                    try{
                        echo "Done user @$user";
                        $MadelineProto->channels->updateUsername(['channel' => $chat_mack, 'username' => $user]);
                        
                        $ch = file_get_contents("_ch.txt");
				        $Text = "❗️| Hi Muslim.\n————————————\n⚠️| New Update : @$user !\n❗️| Channel Checker : @ !\n❕| Loop's : $i\n————————————\n❗️| By : @uuunr";
                        $MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => "/send ".$Text]);
                        $MadelineProto->messages->sendMessage(['peer' => $chat_mack, 'message' => $Text]);
                        $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                        file_put_contents("_users.txt", $data);
                        $updates = $MadelineProto->channels->createChannel(['broadcast' => true,'megagroup' => false,'title' => file_get_contents("_name.txt"), ]);
                        $chat_mack = $updates['updates'][1];
                    }catch(Exception $e){
                        echo $e->getMessage();
                        if($e->getMessage() == "The provided username is not valid"){
                            $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                            file_put_contents("_users.txt", $data);
                            $MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => '/send This username is (banned/smaller than 5) i delete it from users list : @' . $user ]);
                        }elseif(preg_match('/FLOOD_WAIT_(.*)/i', $e->getMessage())){
                            $seconds = str_replace('FLOOD_WAIT_', '', $e->getMessage());
                            $MadelineProto->messages->sendMessage(['peer'=>file_get_contents("_ad.txt"),'message'=>"/send I'm sleeping : ".$seconds]);
                            sleep($seconds);
                        }elseif($e->getMessage() == "USERNAME_OCCUPIED"){
                            $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                            file_put_contents("_users.txt", $data);
                            $MadelineProto->messages->sendMessage(['peer'=>file_get_contents("_ad.txt"),'message'=>"/send I could not save it : @$user"]);
                        }elseif($e->getMessage() == "CHANNELS_ADMIN_PUBLIC_TOO_MUCH"){
                             $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                            file_put_contents("_users.txt", $data);
                            $MadelineProto->messages->sendMessage(['peer'=>file_get_contents("_ad.txt"),'message'=>"/send CHANNELS_ADMIN_PUBLIC_TOO_MUCH : @$user"]);
                          
                        }else{
                            $MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => "ERROR - ".$e->getMessage()]);
                        }

  
                    }
	        }
        }
    }
}
}

function Account(){
    $settings['app_info']['api_id'] = 579315;
$settings['app_info']['api_hash'] = '4ace69ed2f78cec268dc7483fd3d3424';
$MadelineProto = new \danog\MadelineProto\API('mdddd.madeline', $settings);
$MadelineProto->start();

$MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => "/send checker start run | type - account"]);
$i = 0;
while(1){
    $users = explode("\n",file_get_contents("_users.txt"));
    foreach($users as $user){
        if($user != ""){
            try{
            	$MadelineProto->messages->getPeerDialogs(['peers' => [$user], ]);
            	echo "Loop : ".$i++." | Time : ".date("s")." | User : $user\n";
            } catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
                    try{
                        echo "Done user @$user";
                        $MadelineProto->account->updateUsername(['username'=>$user]);
                        $ch = file_get_contents("_ch.txt");
				        $Text = "❗️| Hi Muslim.\n————————————\n⚠️| New Update : @$user !\n❗️| Channel Checker : @ !\n❕| Loop's : $i\n————————————\n❗️| By : @uuunr";
                        $MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => "/send ".$Text]);
                        $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                        file_put_contents("_users.txt", $data);
                    }catch(Exception $e){
                        if($e->getMessage() == "The provided username is not valid"){
                            $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                            file_put_contents("_users.txt", $data);
                            $MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => '/send This username is (banned/smaller than 5) i delete it from users list : @' . $user ]);
                        }elseif(preg_match('/FLOOD_WAIT_(.*)/i', $e->getMessage())){
                            $seconds = str_replace('FLOOD_WAIT_', '', $e->getMessage());
                            $MadelineProto->messages->sendMessage(['peer'=>file_get_contents("_ad.txt"),'message'=>"/send I'm sleeping : ".$seconds]);
                            sleep($seconds);
                        }elseif($e->getMessage() == "USERNAME_OCCUPIED"){
                            $data = str_replace("\n".$user,"", file_get_contents("_users.txt"));
                            file_put_contents("_users.txt", $data);
                            $MadelineProto->messages->sendMessage(['peer'=>file_get_contents("_ad.txt"),'message'=>"/send I could not save it : @$user"]);
                        }else{
                            $MadelineProto->messages->sendMessage(['peer' => file_get_contents("_ad.txt"), 'message' => "ERROR - ".$e->getMessage()]);
                        }

  
                    }
	        }
        }
    }
}
}

$type = file_get_contents("_type.txt");

if($type == "c"){
    Channel();
}
if($type == "a"){
    Account();
}
