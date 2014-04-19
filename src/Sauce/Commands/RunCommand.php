<?php namespace Sauce\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Sauce\Sauce;

class RunCommand extends Command {

    /**
     * The Sauce instance
     *
     * @var \Sauce\Sauce
     */
    protected $sauce;

    /**
     * The constructor
     *
     * @param \Sauce\Sauce|null $sauce
     * @return RunCommand
     */
    public function __construct(Sauce $sauce = null)
    {
        parent::__construct();

        $this->sauce = $sauce ?: new Sauce;
    }

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

        $output->writeln("<info>Running task: <comment>{$task}</comment>...</info>");

        $this->sauce->run($task);
    }

}

