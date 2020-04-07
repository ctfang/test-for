<?php

use App\App;
use WorkerApp\Server\AllWorker;

$bean = include APP_ROOT_PATH."/app/bean.php";

$sc = App::getSelf()->getContainer();

foreach ($bean as $beanName=>$beanServerConfig){
    if( isset($beanServerConfig["class"]) ){
        $server = $sc->register($beanName, $beanServerConfig["class"]);
        $server->setProperties($beanServerConfig);
    }
}

$sc->register('worker', AllWorker::class);
