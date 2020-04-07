<?php


namespace App;

use App\Console\Command\HttpCommand;
use WorkerApp\Server\AppServer;

/**
 * Class App
 * @package App
 */
class App extends AppServer
{
    public function initConsole()
    {
        $this->console->add(new HttpCommand());
    }
}