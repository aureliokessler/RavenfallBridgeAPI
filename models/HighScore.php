<?php


namespace RavenfallBridge\models;


class HighScore
{
    private $players;
    private $skill;
    private $offset;
    private $total;

    /**
     * HighScoreCollection constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setPlayers($data['players']);
        $this->setSkill($data['skill']);
        $this->setOffset($data['offset']);
        $this->setTotal($data['total']);
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param mixed $players
     */
    public function setPlayers($players): void
    {
        $this->players = $players;
    }

    /**
     * @return mixed
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param mixed $skill
     */
    public function setSkill($skill): void
    {
        $this->skill = $skill;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->total = $total;
    }

    public function toJSON()
    {
        return json_encode([
            $this->getPlayers(),
            $this->getSkill(),
            $this->getOffset(),
            $this->getTotal()
        ]);
    }
}