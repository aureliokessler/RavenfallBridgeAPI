<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\ItemCollection;

class Items extends Connect
{
    public function getAll()
    {
        $url = BASE_API_URL . "/items";

        try {
            new ItemCollection($this->get($url));
            return true;
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function Add(ItemCollection $item)
    {
        $url = BASE_API_URL . "/items";

        $header = [
            "Content-Type" => "application/json"
        ];

        try {
            return $this->post($url, $item->toArray(), $header) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function del(string $itemId)
    {
        $url = BASE_API_URL . "/items/" . $itemId;

        $header = [
            "Content-Type" => "application/json"
        ];

        try {
            return $this->delete($url, [], $header) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function update(ItemCollection $item)
    {
        $url = BASE_API_URL . "/items";

        $header = [
            "Content-Type" => "application/json"
        ];

        try {
            return $this->put($url, $item->toArray(), $header) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}