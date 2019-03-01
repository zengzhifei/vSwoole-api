<?php
return array(
    //默认配置
    'DEFAULT_M_LAYER'       => 'Model',            // 默认的模型层名称
    'DEFAULT_C_LAYER'       => 'Controller',        // 默认的控制器层名称
    'DEFAULT_V_LAYER'       => 'View',            // 默认的视图层名称
    'DEFAULT_LANG'          => 'zh-cn',            // 默认语言
    'DEFAULT_THEME'         => '',            // 默认模板主题名称
    'DEFAULT_MODULE'        => 'Api',            // 默认模块
    'DEFAULT_CONTROLLER'    => 'Index',            // 默认控制器名称
    'DEFAULT_ACTION'        => 'index',            // 默认操作名称
    'DEFAULT_CHARSET'       => 'utf-8',            // 默认输出编码
    'DEFAULT_TIMEZONE'      => 'PRC',            // 默认时区
    'DEFAULT_AJAX_RETURN'   => 'JSON',            // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_JSONP_HANDLER' => 'jsonpReturn',        // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'        => 'htmlspecialchars',    // 默认参数过滤方法 用于I函数...

    //数据缓存
    'DATA_CACHE_TIME'       => 0,                // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS'   => false,            // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'      => false,            // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'     => '',                // 缓存前缀
    'DATA_CACHE_TYPE'       => 'File',            // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH'       => TEMP_PATH,            // 缓存路径设置 (仅对File方式缓存有效)
    'DATA_CACHE_SUBDIR'     => false,                // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'       => 1,                    // 子目录缓存级别

    //日志配置
    'LOG_RECORD'            => true,            // 默认不记录日志
    'LOG_TYPE'              => 'File',            // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             => 'EMERG,ALERT,CRIT,ERR',    // 允许记录的日志级别
    'LOG_EXCEPTION_RECORD'  => true,            // 是否记录异常信息日志

    //session配置
    'SESSION_AUTO_START'    => true,                // 是否自动开启Session
    'SESSION_OPTIONS'       => array(),            // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE'          => '',                // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX'        => '',                // session 前缀

    //url配置
    'URL_CASE_INSENSITIVE'  => true,            // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             => 1,                // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'URL_PATHINFO_DEPR'     => '/',                // PATHINFO模式下，各参数之间的分割符号
    'URL_PATHINFO_FETCH'    => 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
    'URL_REQUEST_URI'       => 'REQUEST_URI',        // 获取当前页面地址的系统变量 默认为REQUEST_URI
    'URL_HTML_SUFFIX'       => 'html',            // URL伪静态后缀设置
    'URL_DENY_SUFFIX'       => 'ico|png|gif|jpg',        // URL禁止访问的后缀设置
    'URL_PARAMS_BIND'       => true,            // URL变量绑定到Action方法参数
    'URL_PARAMS_BIND_TYPE'  => 0,                // URL变量绑定的类型 0 按变量名绑定 1 按变量顺序绑定
    'URL_404_REDIRECT'      => '',            // 404 跳转页面 部署模式有效
    'URL_ROUTER_ON'         => false,            // 是否开启URL路由
    'URL_ROUTE_RULES'       => array(),            // 默认路由规则 针对模块
    'URL_MAP_RULES'         => array(),            // URL映射定义规则

    // 加载扩展配置文件
    'LOAD_EXT_CONFIG'       => 'db,redis',
);
