<?php
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Fluent;
// 引入composer的自动加载文件
require __DIR__.'/../vendor/autoload.php';

// 实例化服务容器，注事件、路由服务提供者
$app = new Illuminate\Container\Container;
Illuminate\Container\Container::setInstance($app);
with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

// 启动Eloquent ORM模块并进行相关配置
$manager = new Manager();
$manager->addConnection(require '../config/database.php');
$manager->bootEloquent();
$app->instance('config',new Fluent);
$app['config']['view.complied'] = 'D:\phpStudy\WWW\Laravelkey\storage\framework\views\\';
$app['config']['view.paths'] = ['D:\phpStudy\WWW\Laravelkey\resources\views\\'];
// $app['config']['view.complied'] = "D:\\phpStudy\\WWW\\Laravelkey\\storage\\framework\\views\\";
// $app['config']['view.paths'] = ["D:\\phpStudy\\WWW\\Laravelkey\\resources\\views\\"];


with(new Illuminate\View\ViewServiceProvider($app))->register();
with(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();

// 加载路由
require __DIR__."/../app/Http/routes.php";
$request = Illuminate\Http\Request::createFromGlobals();
$response = $app['router']->dispatch($request);
// 返回请求响应
$response->send();
