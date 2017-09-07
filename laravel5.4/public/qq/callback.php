<?php

require_once 'function.php';
require_once 'Connect2.1/qqConnectAPI.php';
//echo $_GET['code'];
//请求accesstoken
$oauth = new Oauth();
// var_dump($oauth);
$accesstoken = $oauth ->qq_callback();

$openid = $oauth->get_openid();
// session_start();
$_SESSION['qq_accesstoken']=$accesstoken;
$_SESSION['qq_openid']=$openid;




//echo $_SESSION['qq_openid'];exit;
// setcookie('qq_accesstoken',$accesstoken,time()+86400);
// setcookie('qq_openid',$openid,time()+86400);
 //echo $_SESSION['qq_accesstoken'];die;





// define('TOKEN',$_COOKIE['qq_accesstoken']);


// echo "<pre>";
// print_r($AA);exit;
// 
// Route::get('home',function(){
// 	//从session中获取数据
// 	$value = session('key');
// 	//指定默认值
// 	$value = session('key','default');
// 	//存储数据到session
// 	session(['key'=>'value']);
// })
header("Location:/");