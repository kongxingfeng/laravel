<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2017/9/1
 * 新浪
 */
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
class Sina2Controller extends Controller{

	public function index()
	{
		require_once '../public/sina/config.php';
	    require_once '../public/sina/libweibo-master/saetv2.ex.class.php';
		$Sin =new \SaeTOAuthV2(WB_KEY,WB_SEC);
		$url='http://www.panda.com/sina/callback.php';

		$oauth=$Sin->getAuthorizeURL($url);
		header('Location:'.$oauth);
	}
	public function sinatui()
	{
		session_start();
		unset($_SESSION['sinauid']);
		unset($_SESSION['screen_name']);
		unset($_SESSION['profile_image_url']);
		
		// session_unset();
		// session_destroy();
		return redirect('/');
	}


}