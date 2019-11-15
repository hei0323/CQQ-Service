<?php

namespace app\http\middleware;


use think\Request;

class Check
{
    public function handle(Request $request, \Closure $next)
    {
        $request->setHost('114.114.114.114');
        return $next($request);
    }
}
