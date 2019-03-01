<?php

namespace Api\Controller;


use Common\Lib\Redis;

class DownloadController extends ApiController
{
    const DOWNLOAD_RECORD_COUNT = 'download_record_count';

    public function getDownloadList()
    {
        $downloadList = array(
            [
                'vswoole_version' => 'vSwoole-v1.2',
                'vswoole_date'    => '2018/8/30',
                'vswoole_url'     => 'https://github.com/zengzhifei/vSwoole/archive/v1.2.zip',
                'download_count'  => Redis::hget(self::DOWNLOAD_RECORD_COUNT, 'vSwoole-v1.2'),
            ],
            [
                'vswoole_version' => 'vSwoole-v2.0.0',
                'vswoole_date'    => '2018/11/7',
                'vswoole_url'     => 'https://github.com/zengzhifei/vSwoole/archive/v2.0.0.zip',
                'download_count'  => Redis::hget(self::DOWNLOAD_RECORD_COUNT, 'vSwoole-v2.0.0'),
            ],
        );

        $this->ajaxReturn(array('status' => API_RETURN_SUCCESS, 'data' => array('downloadList' => $downloadList)));
    }

    public function recordDownload()
    {
        $version = I('downloadVersion');

        $downloadCount = Redis::hincrby(self::DOWNLOAD_RECORD_COUNT, $version, 1);

        $this->ajaxReturn(array('status' => API_RETURN_SUCCESS, 'data' => array('downloadCount' => $downloadCount)));
    }
}