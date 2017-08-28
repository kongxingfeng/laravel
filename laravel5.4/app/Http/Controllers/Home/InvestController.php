<?php
/**
 * Created by PhpStorm.
 * User: 唯你
 * Date: 2017/8/27
 * Time: 20:45
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class InvestController extends Controller {
    public function index()
    {
        return view('invest/index');
    }
}