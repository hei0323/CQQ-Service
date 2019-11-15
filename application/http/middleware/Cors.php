<?php

namespace app\http\middleware;

class Cors
{
    public function handle($request, \Closure $next)
    {
        //多域名-CORS跨域方案-服务端
        $allowOrigin = array(
            'http://www.chat.com,http://web.newweb.com', 'http://web.chejj.cn', 'http://web.mycjj.com', 'https://web.chejj.cn', 'https://web.mycjj.com',
            'http://www.newweb.com', 'http://www.chejj.cn', 'http://www.mycjj.com', 'https://www.chejj.cn', 'https://www.mycjj.com',
            'http://4s.newweb.com', 'http://4s.chejj.cn', 'http://4s.mycjj.com', 'https://4s.chejj.cn', 'https://4s.mycjj.com',
            'http://api.newweb.com', 'http://api.chejj.cn', 'http://api.mycjj.com', 'https://api.chejj.cn', 'https://api.mycjj.com');
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        if (in_array($origin, $allowOrigin)) {
            header('Access-Control-Allow-Origin:' . $origin);
        }
        header('Access-Control-Allow-Headers:Origin,X-Requested-With,Content-Type,Accept,Authorization,Cookie');
        header('Access-Control-Allow-Methods:GET,POST');
        header("Access-Control-Allow-Credentials:true"); //允许携带cookie
        header("Access-Control-Max-Age:1728000"); //减少预检请求次数

        return $next($request);
    }
}
