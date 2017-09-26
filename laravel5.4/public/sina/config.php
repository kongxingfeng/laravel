<?php
define('WB_KEY','2553356242');
define('WB_SEC','c00dffd057062e8ab2601575f68c6ede');
// define('CALLBACK','http://www.jsonp.com/callback.php');
function debug($val,$dump = false,$exit = true)
{
	if($dump)
	{
		$func = 'var_dump';
	}else
	{
		$func = (is_array($val) || is_object($val)) ? 'print_r' : 'printf';
	}

	//输出到html
	header("content-type:text/html;charset=utf-8");
	echo "<pre>de bug outpt:<hr/>";
	echo "<pre>";
	if($exit) exit;
}