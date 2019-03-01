<?php

namespace Common\Lib;


class Util
{
    public static function getServerIp()
    {
        $hostname = gethostname();

        return gethostbyname($hostname);
    }

    public static function getClientIp()
    {
        if (filter_var(getenv('HTTP_CLIENT_IP'), FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)) {
            $clientIp = getenv('HTTP_CLIENT_IP');
        } elseif (filter_var(getenv('HTTP_X_FORWARDED_FOR'), FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)) {
            $clientIp = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR')) {
            $clientIp = getenv('REMOTE_ADDR');
        } else {
            $clientIp = $_SERVER['REMOTE_ADDR'];
        }

        return $clientIp;
    }
}