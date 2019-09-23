<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SayLolCommand extends Command
{
    protected static $defaultName = 'say:lol';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo 'LoL' . PHP_EOL;
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('LoL! You passed an argument: %s', $arg1));
        } else {
            $io->note(sprintf('LoL! You passed nothing!'));
        }

        if ($input->getOption('option1')) {
            // ...
        }
        echo 'LoL' . PHP_EOL;
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
