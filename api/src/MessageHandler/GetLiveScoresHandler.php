<?php

namespace App\MessageHandler;

use App\Document\LiveScores;
use App\Message\GetLiveScores;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class GetLiveScoresHandler implements MessageHandlerInterface
{

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
        $this->client = $client;
        $this->appKernel = $appKernel;
        $this->dm = $dm;
    }

    public function __invoke(GetLiveScores $message)
    {
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

        return Command::SUCCESS;
    }
}
