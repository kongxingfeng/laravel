<?php
require_once 'function.php';
require_once 'Connect2.1/qqConnectAPI.php';

//echo $_GET['code'];
//请求accesstoken
$oauth = new Oauth();
$accesstoken = $oauth ->qq_callback();
$openid = $oauth->get_openid();

setcookie('qq_accesstoken',$accesstoken,time()+86400);
setcookie('qq_openid',$openid,time()+86400);

header('Location:index.php');