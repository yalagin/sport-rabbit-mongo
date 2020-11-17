<?php

namespace App\Command;

use App\Message\GetLiveScores;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class SendLiveScoresCommand extends Command
{
    /**
     * @var MessageBusInterface
     */
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        parent::__construct();
        $this->bus = $bus;
    }

    protected static $defaultName = 'app:sendLiveScores';

    protected function configure()
    {
        $this
            ->setDescription('get live scores from json through messenger')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);


        $this->bus->dispatch( new GetLiveScores());
        $io->success('msg sent');

        return Command::SUCCESS;
    }
}
