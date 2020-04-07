<?php

use App\Http\HttpEvent;
use WorkerApp\Http\HttpServer;

return [
    "HttpServer" => [
        "class" => HttpServer::class,
        "event" => HttpEvent::class,
        "port" => 80
    ],
];
