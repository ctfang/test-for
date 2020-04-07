<?php


namespace WorkerApp\Server;


use App\App;
use Workerman\Worker;

/**
 * Class AllWorker
 * @package WorkerApp\Server
 */
class AllWorker
{
    public function run()
    {
        $container = App::getSelf()->getContainer();

        $allBean = $container->getServiceIds();
        $runAll = false;
        foreach ($allBean as $str) {
            $bean = $container->get($str);

            if ($bean instanceof ServerAbstract) {
                if ($bean->runInAll) {
                    $bean->newWorker();

                    $eventClass = $bean->event;
                    /** @var WorkerEvent $event */
                    $event = new $eventClass($bean->worker);
                    $event->setEvent();
                    $runAll = true;
                }
            }
        }

        if ($runAll) {
            Worker::runAll();
        }
    }
}