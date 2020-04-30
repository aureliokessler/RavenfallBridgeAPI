<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\helpers\HBase64Token;
use RavenfallBridge\models\ItemCollection;

class Items extends Connect
{
    use HBase64Token;

    /**
     * this will return the list of all available items in Ravenfall
     *
     * @return ItemCollection|string <p>
     *  <b>ItemCollection</b>:
     *  <b>string</b>:
     * </p>
     */
    public function getAll()
    {
        $url = BASE_API_URL . "/items";

        try {
            return new ItemCollection($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * add a new item to the game
     *
     * @param ItemCollection $item
     * @return bool|string
     */
    public function Add(ItemCollection $item)
    {
        $url = BASE_API_URL . "/items";

        $header = [
            "Content-Type: application/json"
        ];

        try {
            return $this->post($url, $item->toArray(), array_merge($this->global_header, $header)) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * this will delete an item from the game
     *
     * @param string $itemId
     * @return bool|string
     */
    public function del(string $itemId)
    {
        $url = BASE_API_URL . "/items/" . $itemId;

        $header = [
            "Content-Type: application/json"
        ];

        try {
            return $this->delete($url, [], array_merge($this->global_header, $header)) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function update(ItemCollection $item)
    {
        $url = BASE_API_URL . "/items";

        $header = [
            "Content-Type: application/json"
        ];

        try {
            return $this->put($url, $item->toArray(), array_merge($this->global_header, $header)) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}