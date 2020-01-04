<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\ItemCollection;

class Items extends Connect
{
    private $global_header;

    /**
     * @param string $base64_token
     */
    public function setBase64Token(string $base64_token): void
    {
        $this->global_header = [
            "auth-token" => $base64_token
        ];
    }

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

    public function Add(ItemCollection $item)
    {
        $url = BASE_API_URL . "/items";

        $header = [
            "Content-Type" => "application/json"
        ];

        try {
            return $this->post($url, $item->toArray(), array_merge($this->global_header, $header)) == [true];
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
            "Content-Type" => "application/json"
        ];

        try {
            return $this->put($url, $item->toArray(), array_merge($this->global_header, $header)) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}