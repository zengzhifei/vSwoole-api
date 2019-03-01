<?php
/**
 * Created by PhpStorm.
 * User: zengz
 * Date: 2019/3/2
 * Time: 2:00
 */

namespace Api\Controller;


use Think\Controller;

class ApiController extends Controller
{
    public function _initialize()
    {
        header('Access-Control-Allow-Origin:*');
    }

}