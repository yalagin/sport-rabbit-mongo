<?php


namespace App\Controller;


use App\Message\GetLiveScores;
use Symfony\Component\Messenger\MessageBusInterface;

class SendMsgAction
{
    public function __invoke(MessageBusInterface $bus)
    {
        $bus->dispatch( new GetLiveScores());
    }
}
