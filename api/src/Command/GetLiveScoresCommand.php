<?php

namespace App\Command;

use App\Document\LiveScores;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetLiveScoresCommand extends Command
{
    protected static $defaultName = 'app:getLiveScores';
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;
    /**
     * @var KernelInterface
     */
    private KernelInterface $appKernel;
    /**
     * @var DocumentManager
     */
    private DocumentManager $dm;


    public function __construct(HttpClientInterface $client,KernelInterface $appKernel,DocumentManager $dm)
    {
        parent::__construct();
        $this->client = $client;
        $this->appKernel = $appKernel;
        $this->dm = $dm;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $path = $this->appKernel->getProjectDir() . '/livescores.json';

        $rawJson = file_get_contents($path);
        $json =  json_decode($rawJson,true);

        foreach($json['data'] as $liveScoreData){
            $liveScore =  new LiveScores();
            $liveScore->fromArray($liveScoreData);
            $liveScore->setTimeUpdated(new DateTime());
            $this->dm->persist($liveScore);
            $this->dm->flush();
        }

        $io->success('done');

        return Command::SUCCESS;
    }
}
