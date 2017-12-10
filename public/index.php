<?php
// 引入composer的自动加载文件
require __DIR__.'/../vendor/autoload.php';
// 实例化服务容器，注事件、路由服务提供者
$app = new Illuminate\Container\Container;
with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

// 加载路由
require __DIR__."/../app/Http/routes.php";
$request = Illuminate\Http\Request::createFromGlobals();
$response = $app['router']->dispatch($request);
// 返回请求响应
$response->send();