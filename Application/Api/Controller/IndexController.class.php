<?php

namespace Api\Controller;

use Think\Controller;
use Common\Lib\Redis;

class IndexController extends Controller
{
    public function index()
    {
        print_r('hello');
    }

    public function getUser()
    {
        Redis::set('user',1);
        $this->ajaxReturn(array('status' => 0, 'msg' => 'success', 'data' => Redis::get('user')));
    }

}
