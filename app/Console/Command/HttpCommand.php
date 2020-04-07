<?php


namespace App\Console\Command;


use App\App;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WorkerApp\Http\HttpServer;

/**
 * Class HttpCommand
 * @package App\Console\Command
 */
class HttpCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('http:start')
            ->setDescription('启动http服务')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
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