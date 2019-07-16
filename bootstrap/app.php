<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|我们要做的第一件事是创建一个新的Laravel应用程序实例
哪个是Laravel所有组件的“胶水”
用于系统绑定所有不同部分的IoC容器。
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/
//创建服务容器;

//如果没有设置环境变量APP_BASE_PATH;
//就用 dirname(__DIR__)作为base_path;也就是bootstrap的上级目录；
//这里是blog下面;D:\xampp\htdocs\blog
//初始化设置文件夹目录，注册基本服务提供者:事件服务，日志服务，路由服务；设置别名：$this->alises;



$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);
/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/
//接下来，我们需要将一些重要的接口绑定到容器中，以便在需要时解决它们。
//内核同时为来自web和CLI的应用程序的传入请求提供服务。


//单例绑定：初始化没有Illuminate\Contracts\Http\Kernel::class;
//$this->bindings['Illuminate\Contracts\Http\Kernel']=['concrete'=>Closure,'shared'=>true]
//注册http内核
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

//注册console内核，cli模式：
//$this->bindings['Illuminate\Contracts\Console\Kernel']=['concrete'=>Closure,'shared'=>true]
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);
//$this->bindings['Illuminate\Contracts\Debug\ExceptionHandler']=['concrete'=>Closure,'shared'=>true]
//debug模式；
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
