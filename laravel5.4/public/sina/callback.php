<?php
use Illuminate\Http\Request;
	
	require_once 'config.php';
	require_once 'libweibo-master/saetv2.ex.class.php';
	$code = $_GET['code'];

    $url='http://www.panda.com/sina/callback.php';
	$keys['code']=$code;
	$keys['redirect_uri']=$url;
	$Sin =new \SaeTOAuthV2(WB_KEY,WB_SEC);
	$info=$Sin->getAccessToken($keys,'code');
	$url="https://api.weibo.com/2/users/show.json?access_token=".$info['access_token']."&uid=".$info['uid'];
	$arr=file_get_contents($url);
	$data=json_decode($arr,true);

	session_start();
	$uid=$info['uid'];
	$_SESSION['sinauid']=$uid;
	$_SESSION['screen_name']=$data['screen_name'];
	$_SESSION['profile_image_url']=$data['profile_image_url'];
	
	header('Location:/');
?>

