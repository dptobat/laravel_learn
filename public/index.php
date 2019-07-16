<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/
//Composer为我们的应用程序提供了一个方便的、自动生成的类加载器。
//我们只需要利用它!我们只需要在这里的脚本中使用它，这样我们就不必担心以后手动加载任何类。
//放松的感觉很棒。
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/
//我们需要阐明PHP开发，所以让我们打开天窗说亮话。这将引导框架并使其准备好使用，
//然后它将加载这个应用程序，以便我们可以运行它并将响应发送回浏览器，让我们的用户高兴。
//初始化设置文件夹目录，注册基本服务提供者:事件服务，日志服务，路由服务；设置别名：$this->alises;
$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|一旦有了应用程序，就可以处理传入的请求
，并将关联的响应发送回
客户端浏览器允许他们享受创意
我们已经为他们准备了很好的应用程序。
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

//主要是看make做了哪些操作;
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
