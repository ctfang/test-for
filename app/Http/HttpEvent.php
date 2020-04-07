<?php


namespace App\Http;


use React\MySQL\Factory;
use WorkerApp\Http\WorkerEvent;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Request;
use Workerman\Worker;

/**
 * Class HttpEvent
 * @package App\Http
 */
class HttpEvent extends WorkerEvent
{
    /**
     * @var Worker
     */
    public $worker;

    public function onWorkerStart(Worker $worker)
    {
        $this->worker = $worker;

        $loop  = Worker::getEventLoop();

        $factory = new Factory($loop);

        $uri = 'root:123456@mysql/workermen-app';
        $connection = $factory->createLazyConnection($uri);

        $connection->query('SELECT * FROM book')->then(
            function (...$command) {
                dump($command);
            },
            function (...$command) {
                dump($command);
            }
        );

        dump("OK");
    }

    /**
     * 收到请求触发
     *
     * @param $connection
     * @param $data
     * @return mixed
     */
    public function onMessage(TcpConnection $connection, Request $data)
    {
        $connection->send('hello world');
    }
}