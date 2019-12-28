<?php


namespace RavenfallBridge\models;


class GameInfo
{
    private $user_id;
    private $uptime;
    private $peak_player_count;
    private $player_count;
    private $event_revision;

    public function __construct(array $data)
    {
        $this->setUserId($data['userId']);
        $this->setUptime($data['uptime']);
        $this->setPeakPlayerCount($data['peak_player_count']);
        $this->setPlayerCount($data['player_count']);
        $this->setEventRevision($data['event_revision']);
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUptime()
    {
        return $this->uptime;
    }

    /**
     * @param mixed $uptime
     */
    public function setUptime($uptime): void
    {
        $this->uptime = $uptime;
    }

    /**
     * @return mixed
     */
    public function getPeakPlayerCount()
    {
        return $this->peak_player_count;
    }

    /**
     * @param mixed $peak_player_count
     */
    public function setPeakPlayerCount($peak_player_count): void
    {
        $this->peak_player_count = $peak_player_count;
    }

    /**
     * @return mixed
     */
    public function getPlayerCount()
    {
        return $this->player_count;
    }

    /**
     * @param mixed $player_count
     */
    public function setPlayerCount($player_count): void
    {
        $this->player_count = $player_count;
    }

    /**
     * @return mixed
     */
    public function getEventRevision()
    {
        return $this->event_revision;
    }

    /**
     * @param mixed $event_revision
     */
    public function setEventRevision($event_revision): void
    {
        $this->event_revision = $event_revision;
    }


}