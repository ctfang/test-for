<?php


namespace App\Console\Command;


use App\App;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WorkerApp\Http\HttpServer;
use WorkerApp\Server\Command;

/**
 * Class HttpCommand
 * @package App\Console\Command
 */
class HttpCommand extends Command
{
    protected $name = "http:start";

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \Exception
     */
    public function handel(InputInterface $input, OutputInterface $output)
    {
        /** @var HttpServer $httpServer */
        $httpServer = App::getSelf()->getContainer()->get('HttpServer');

        $httpServer->runInAll = true;

        global $argv;

        $argv[0] = APP_ROOT_PATH."/http:start";
        $argv[1] = "start";

        App::get('worker')->run();
    }
}