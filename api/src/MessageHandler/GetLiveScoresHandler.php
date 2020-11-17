<?php

namespace App\MessageHandler;

use App\Message\GetLiveScores;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetLiveScoresHandler implements MessageHandlerInterface
{
    public function __invoke(GetLiveScores $message)
    {
        // do something with your message
    }
}
