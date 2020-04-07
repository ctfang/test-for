<?php


namespace WorkerApp\Server;


use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AppServer
{
    /**
     * @var Application
     */
    protected $console;

    /**
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * @var AppServer
     */
    protected static $selfApp;

    /**
     * AppServer constructor.
     * @param Application $console
     */
    public function __construct(Application $console)
    {
        $this->console = $console;

        self::$selfApp = $this;
    }

    /**
     * @param $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerBuilder
     */
    public function getContainer():ContainerBuilder
    {
        return $this->container;
    }

    /**
     * @param $id
     * @param int $invalidBehavior
     * @return object|null
     * @throws \Exception
     */
    public static function get($id, int $invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE)
    {
        return self::getSelf()->getContainer()->get($id,$invalidBehavior);
    }

    /**
     * @return \App\App
     */
    public static function getSelf():self
    {
        return self::$selfApp;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        $this->console->run();
    }
}