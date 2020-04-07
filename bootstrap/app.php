<?php

use App\App;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection;

require APP_ROOT_PATH.'/vendor/autoload.php';

$app = new App(new Application());
$container = new DependencyInjection\ContainerBuilder();
App::getSelf()->setContainer($container);

ini_set('display_errors', 1);
error_reporting(-1);

require_once "initEnv.php";
require_once "initBean.php";

return $app;