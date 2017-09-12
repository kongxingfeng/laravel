<?php
require_once '../public/qq/function.php';
require_once '../public/qq/Connect2.1/qqConnectAPI.php';
//qq登录界面
//Oauth.class.php  里面几乎包含了 qq所有重要的类库  里面有qq_login方法
$oauth = new Oauth();
 //var_dump($oauth);
$oauth->qq_login();