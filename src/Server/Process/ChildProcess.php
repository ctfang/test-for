<?php
/**
 * Created by PhpStorm.
 * User: wecut
 * Date: 2020-04-10
 * Time: 11:03
 */

namespace WorkerApp\Server\Process;


abstract class ChildProcess
{
    abstract public function run();
}