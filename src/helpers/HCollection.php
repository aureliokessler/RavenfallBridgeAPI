<?php


namespace RavenfallBridge\helpers;


class HCollection
{
    private $collection = [];

    public function __construct(array $data)
    {
        foreach ($data as $item) {
            $this->Add($item);
        }
    }

    public function Add(array $item)
    {
        $this->collection += $item;
    }
}