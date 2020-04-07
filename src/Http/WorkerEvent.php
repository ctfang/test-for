<?php


namespace WorkerApp\Http;


use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;
use Workerman\Worker;

/**
 * Class WorkerEvent
 * @package WorkerApp\Http
 */
abstract class WorkerEvent extends \WorkerApp\Server\WorkerEvent
{
    public function onWorkerStart(Worker $worker)
    {

    }

    public function onWorkerReload(Worker $worker)
    {

    }

    public function onWorkerStop(Worker $worker)
    {

    }

    /**
     * 收到请求触发
     *
     * @param $connection
     * @param $data
     * @return mixed
     */
    abstract public function onMessage(TcpConnection $connection, Request $data);

    /**
     * 链接触发
     *
     * @param TcpConnection $connection
     */
    public function onConnect(TcpConnection $connection)
    {

    }


    /**
     * 关闭触发
     *
     * @param TcpConnection $connection
     */
    public function onClose(TcpConnection $connection)
    {

    }

    /**
     * 初始化事件闭包
     */
    public function setEvent()
    {
        $this->worker->onWorkerStart = [$this, 'onWorkerStart'];
        $this->worker->onMessage = [$this, 'onMessage'];
        $this->worker->onConnect = [$this, 'onConnect'];
        $this->worker->onClose = [$this, 'onClose'];

        $this->worker->onWorkerStop = [$this, 'onWorkerStop'];
        $this->worker->onWorkerReload = [$this, 'onWorkerReload'];
    }
}