<?php


namespace App\Controller;


use App\Document\LiveScores;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class LiveScoreGroupBy
{
    /**
     * @Route("/live_scores/group-by-league_id", name="group-by-league_id")
     * @param string $token
     *
     */
    public function __invoke(DocumentManager $dm,SerializerInterface $serializer)
    {
       $collection = $dm->getRepository(LiveScores::class)->findAll();

       $ids = [];
        /** @var LiveScores $score */
       foreach($collection as $score ){
           //todo it will make json looks good but will brake web gui because too heavy load on browser
//           $jsonContent = $serializer->normalize($score, null);
           $jsonContent = $serializer->serialize($score, 'json');
            if( isset(  $ids[$score->getLeagueId()])){
                array_push($ids[$score->getLeagueId()],$jsonContent);
            } else {
                $ids[$score->getLeagueId()] = [$jsonContent];
            }
       }

        return  new JsonResponse($ids);
    }
}
