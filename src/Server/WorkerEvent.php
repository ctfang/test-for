<?php


namespace WorkerApp\Server;


use Workerman\Worker;

/**
 * Class WorkerEvent
 * @package WorkerApp\Server
 */
abstract class WorkerEvent
{
    public $worker;

    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

    abstract public function setEvent();
}