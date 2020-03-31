<?php


namespace RavenfallBridge\models;


class EventCollection
{
    private $game_session_id;
    private $type;
    private $revision;
    private $data;

    /**
     * EventCollection constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setGameSessionId($data["gameSessionId"]);
        $this->setType($data["type"]);
        $this->setRevision($data["revision"]);
        $this->setData($data["data"]);
    }

    /**
     * @return mixed
     */
    public function getGameSessionId()
    {
        return $this->game_session_id;
    }

    /**
     * @param mixed $game_session_id
     */
    public function setGameSessionId($game_session_id): void
    {
        $this->game_session_id = $game_session_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * @param mixed $revision
     */
    public function setRevision($revision): void
    {
        $this->revision = $revision;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
}