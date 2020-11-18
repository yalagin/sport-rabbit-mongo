<?php


namespace App\Document;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use App\Controller\SendMsgAction;
use App\Controller\LiveScoreGroupBy;

/**
 * @ApiResource(
 *     security="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')",
 *     collectionOperations={
 *          "get",
 *          "post",
 *          "get-send-msg"= {
 *             "method"="GET",
 *             "path"="/live_scores/get-new",
 *             "controller"=SendMsgAction::class,
 *          }
 *     }
 * )
 *
 * @ODM\Document
 */
class LiveScores
{
    /**
     * @ODM\Id(strategy="NONE",type="integer")
     */
    private $id;

    /**
     * @ODM\Field(type="integer")
     */
    private $league_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $season_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $stage_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $round_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $group_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $aggregate_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $venue_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $localteam_id;

    /**
     * @ODM\Field(type="integer")
     */
    private $winner_team_id;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $weather_report;
    /**
     * @ODM\Field(type="boolean")
     */
    private $commentaries;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $attendance;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $pitch;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $details;
    /**
     * @ODM\Field(type="boolean")
     */
    private $neutral_venue;
    /**
     * @ODM\Field(type="boolean")
     */
    private $winning_odds_calculated;

    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $formations;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $scores;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $time;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $coaches;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $standings;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $assistants;
    /**
     * @ODM\Field(type="string")
     */
    private $leg;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $colors;
    /**
     * @ODM\Field(type="boolean")
     */
    private $deleted;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $localTeam;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $visitorTeam;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $tvstations;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $league;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $round;
    /**
     * @ODM\Field(type="raw", nullable=true)
     */
    private $stage;

    /** @ODM\Field(type="date") */
    private $timeUpdated;

    /**
     * Assign entity properties using an array
     *
     * @param array $attributes assoc array of values to assign
     * @return null
     */
    public function fromArray(array $attributes)
    {
        foreach ($attributes as $name => $value) {
            if (property_exists($this, $name)) {
                $methodName = $this->_getSetterName($name);
                if ($methodName) {
                    $this->{$methodName}($value);
                } else {
                    $this->$name = $value;
                }
            }
        }
    }

    /**
     * Get property setter method name (if exists)
     *
     * @param string $propertyName entity property name
     * @return false|string
     */
    protected function _getSetterName($propertyName)
    {
        $prefixes = array('add', 'set');

        foreach ($prefixes as $prefix) {
            $methodName = sprintf('%s%s', $prefix, ucfirst(strtolower($propertyName)));

            if (method_exists($this, $methodName)) {
                return $methodName;
            }
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return LiveScores
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLeagueId()
    {
        return $this->league_id;
    }

    /**
     * @param mixed $league_id
     * @return LiveScores
     */
    public function setLeagueId($league_id)
    {
        $this->league_id = $league_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeasonId()
    {
        return $this->season_id;
    }

    /**
     * @param mixed $season_id
     * @return LiveScores
     */
    public function setSeasonId($season_id)
    {
        $this->season_id = $season_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStageId()
    {
        return $this->stage_id;
    }

    /**
     * @param mixed $stage_id
     * @return LiveScores
     */
    public function setStageId($stage_id)
    {
        $this->stage_id = $stage_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoundId()
    {
        return $this->round_id;
    }

    /**
     * @param mixed $round_id
     * @return LiveScores
     */
    public function setRoundId($round_id)
    {
        $this->round_id = $round_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     * @return LiveScores
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAggregateId()
    {
        return $this->aggregate_id;
    }

    /**
     * @param mixed $aggregate_id
     * @return LiveScores
     */
    public function setAggregateId($aggregate_id)
    {
        $this->aggregate_id = $aggregate_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenueId()
    {
        return $this->venue_id;
    }

    /**
     * @param mixed $venue_id
     * @return LiveScores
     */
    public function setVenueId($venue_id)
    {
        $this->venue_id = $venue_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalteamId()
    {
        return $this->localteam_id;
    }

    /**
     * @param mixed $localteam_id
     * @return LiveScores
     */
    public function setLocalteamId($localteam_id)
    {
        $this->localteam_id = $localteam_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWinnerTeamId()
    {
        return $this->winner_team_id;
    }

    /**
     * @param mixed $winner_team_id
     * @return LiveScores
     */
    public function setWinnerTeamId($winner_team_id)
    {
        $this->winner_team_id = $winner_team_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeatherReport()
    {
        return $this->weather_report;
    }

    /**
     * @param mixed $weather_report
     * @return LiveScores
     */
    public function setWeatherReport($weather_report)
    {
        $this->weather_report = $weather_report;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentaries()
    {
        return $this->commentaries;
    }

    /**
     * @param mixed $commentaries
     * @return LiveScores
     */
    public function setCommentaries($commentaries)
    {
        $this->commentaries = $commentaries;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttendance()
    {
        return $this->attendance;
    }

    /**
     * @param mixed $attendance
     * @return LiveScores
     */
    public function setAttendance($attendance)
    {
        $this->attendance = $attendance;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * @param mixed $pitch
     * @return LiveScores
     */
    public function setPitch($pitch)
    {
        $this->pitch = $pitch;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     * @return LiveScores
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNeutralVenue()
    {
        return $this->neutral_venue;
    }

    /**
     * @param mixed $neutral_venue
     * @return LiveScores
     */
    public function setNeutralVenue($neutral_venue)
    {
        $this->neutral_venue = $neutral_venue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWinningOddsCalculated()
    {
        return $this->winning_odds_calculated;
    }

    /**
     * @param mixed $winning_odds_calculated
     * @return LiveScores
     */
    public function setWinningOddsCalculated($winning_odds_calculated)
    {
        $this->winning_odds_calculated = $winning_odds_calculated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * @param mixed $formations
     * @return LiveScores
     */
    public function setFormations($formations)
    {
        $this->formations = $formations;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * @param mixed $scores
     * @return LiveScores
     */
    public function setScores($scores)
    {
        $this->scores = $scores;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     * @return LiveScores
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoaches()
    {
        return $this->coaches;
    }

    /**
     * @param mixed $coaches
     * @return LiveScores
     */
    public function setCoaches($coaches)
    {
        $this->coaches = $coaches;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStandings()
    {
        return $this->standings;
    }

    /**
     * @param mixed $standings
     * @return LiveScores
     */
    public function setStandings($standings)
    {
        $this->standings = $standings;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAssistants()
    {
        return $this->assistants;
    }

    /**
     * @param mixed $assistants
     * @return LiveScores
     */
    public function setAssistants($assistants)
    {
        $this->assistants = $assistants;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLeg()
    {
        return $this->leg;
    }

    /**
     * @param mixed $leg
     * @return LiveScores
     */
    public function setLeg($leg)
    {
        $this->leg = $leg;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * @param mixed $colors
     * @return LiveScores
     */
    public function setColors($colors)
    {
        $this->colors = $colors;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     * @return LiveScores
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalTeam()
    {
        return $this->localTeam;
    }

    /**
     * @param mixed $localTeam
     * @return LiveScores
     */
    public function setLocalTeam($localTeam)
    {
        $this->localTeam = $localTeam;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisitorTeam()
    {
        return $this->visitorTeam;
    }

    /**
     * @param mixed $visitorTeam
     * @return LiveScores
     */
    public function setVisitorTeam($visitorTeam)
    {
        $this->visitorTeam = $visitorTeam;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTvstations()
    {
        return $this->tvstations;
    }

    /**
     * @param mixed $tvstations
     * @return LiveScores
     */
    public function setTvstations($tvstations)
    {
        $this->tvstations = $tvstations;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * @param mixed $league
     * @return LiveScores
     */
    public function setLeague($league)
    {
        $this->league = $league;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * @param mixed $round
     * @return LiveScores
     */
    public function setRound($round)
    {
        $this->round = $round;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @param mixed $stage
     * @return LiveScores
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeUpdated()
    {
        return $this->timeUpdated;
    }

    /**
     * @param mixed $timeUpdated
     * @return LiveScores
     */
    public function setTimeUpdated($timeUpdated)
    {
        $this->timeUpdated = $timeUpdated;
        return $this;
    }


}
