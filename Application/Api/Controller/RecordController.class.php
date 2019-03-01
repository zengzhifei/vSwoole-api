<?php

namespace Api\Controller;


use Common\Lib\Redis;
use Common\Lib\Util;

class RecordController extends ApiController
{
    const RECORD_VISITOR_COUNT = 'record_visitor_count';
    const RECORD_VISITOR_INFO = 'record_visitor_info';

    public function visit()
    {
        $data = array(
            'visitIp'   => Util::getClientIp(),
            'visitTime' => $_SERVER['REQUEST_TIME'],
            'visitPage' => $_SERVER['HTTP_REFERER'],
        );

        Redis::rpush(self::RECORD_VISITOR_INFO, json_encode($data));
        Redis::incr(self::RECORD_VISITOR_COUNT);

        $this->ajaxReturn(array('status' => API_RETURN_SUCCESS, 'data' => array('visitTime' => $data['visitTime'])));
    }

}