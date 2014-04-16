<?php namespace Sauce\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class RunCommand extends Command {

    /**
     * Configure the command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('run');
        $this->setDescription('Run a task');

        $this->setDefinition([
            new InputArgument('task', InputArgument::OPTIONAL, 'The name of the task', 'default'),
        ]);
    }

    /**
     * Execute the command
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $task = $input->getArgument('task');

        $output->writeln("<info>Running the task {$task}...</info>");
    }

}

