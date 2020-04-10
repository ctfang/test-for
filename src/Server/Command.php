<?php
/**
 * Created by PhpStorm.
 * User: wecut
 * Date: 2020-04-08
 * Time: 16:07
 */

namespace WorkerApp\Server;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Command extends SymfonyCommand
{
    protected $name = "cmd:run";

    protected $description = "注释";

    protected function configure()
    {
        $this
            ->setName($this->name)
            ->setDescription($this->description);
    }

    /**
     * 执行处理
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    abstract public function handel(InputInterface $input, OutputInterface $output);

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->handel($input,$output);

        return 0;
    }
}