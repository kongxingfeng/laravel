<?php
/**
 * Created by Sublimit
 * User: zy
 * Date: 2017/9/7
 * Time: 14£º20
 */

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use DB;
use Request;
use App\Http\Requests;
class AboutourController extends Controller
{
	public function show()
	{
		return view('aboutour/show');
	}
}

?>