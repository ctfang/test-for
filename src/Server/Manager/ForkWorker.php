<?php
/**
 * Created by PhpStorm.
 * User: wecut
 * Date: 2020-04-08
 * Time: 18:57
 */

namespace WorkerApp\Server\Manager;


use WorkerApp\Server\Process\ChildProcess;

/**
 * Class ForkWorker
 * @package WorkerApp\Server\Manager
 */
class ForkWorker
{
    public static $child = [];


    /**
     * @param ChildProcess $process
     * @return int pid 子进程
     * @throws \Exception
     */
    public static function newWorker(ChildProcess $process): int
    {
        $pid = pcntl_fork();    //创建子进程
        if ($pid == -1) {
            throw new \Exception("创建子进程失败");
        } elseif ($pid) {
            self::$child[$pid] = $process;
            return $pid;
        } else {
            //这里写子进程执行的逻辑
            $process->run();
        }

        return 0;
    }
}