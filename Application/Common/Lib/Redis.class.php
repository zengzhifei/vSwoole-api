<?php

namespace Common\Lib;

class Redis
{
    private static $redis = null;

    private static function connect()
    {
        $configs = array(
            'REDIS_HOST' => C('REDIS_HOST') ?: '127.0.0.1',
            'REDIS_PORT' => C('REDIS_PORT') ?: 6379,
            'REDIS_PASSWORD' => C('REDIS_PASSWORD') ?: '',
            'REDIS_TIMEOUT' => C('REDIS_TIMEOUT') ?: 10,
            'REDIS_PERSISTENT' => C('REDIS_PERSISTENT') ?: true,
        );

        self::$redis = new \Redis;

        if ($configs['REDIS_PERSISTENT']) {
            self::$redis->pconnect($configs['REDIS_HOST'], $configs['REDIS_PORT'], $configs['REDIS_TIMEOUT']);
        } else {
            self::$redis->connect($configs['REDIS_HOST'], $configs['REDIS_PORT'], $configs['REDIS_TIMEOUT']);
        }

        if ($configs['REDIS_PASSWORD']) {
            self::$redis->auth($configs['REDIS_PASSWORD']);
        }

        return self::$redis;
    }

    private static function getKey(string $key = '')
    {
        $prefix = C('REDIS_PREFIX') ?: '';

        return $prefix . trim($key);
    }

    private static function getInstance(bool $forceConnect = false)
    {
        if (is_null(self::$redis) || !(self::$redis instanceof \Redis) || $forceConnect === true) {
            self::connect();
        }

        return self::$redis;
    }

    public static function __callStatic($name, $arguments)
    {
        $arguments[0] = self::getKey($arguments[0]);
        try {
            self::getInstance();
            return call_user_func_array(array(self::$redis, $name), $arguments);
        } catch (\RedisException $exception) {
            self::getInstance(true);
            return call_user_func_array(array(self::$redis, $name), $arguments);
        }
    }
}