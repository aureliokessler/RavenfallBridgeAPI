<?php


namespace RavenfallBridge\models;


class ItemSellResult
{
    private $state;

    public function __construct(array $date)
    {
        $this->setState($date['state']);
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }
}