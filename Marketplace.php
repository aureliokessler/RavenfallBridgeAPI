<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\ItemBuyResult;
use RavenfallBridge\models\ItemSellResult;
use RavenfallBridge\models\MarketItemCollection;

class Marketplace extends Connect
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

    public function getListing(int $offset, int $size)
    {
        $url = BASE_API_URL . "/marketplace/" . $offset . "/" . $size;

        try {
            return new MarketItemCollection($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function sellItem(string $user_id, string $item_id, int $amount, string $price_per_item)
    {
        $url = BASE_API_URL . "/marketplace/" . $user_id . "/sell/" . $item_id . "/". $amount . "/" .$price_per_item;

        try {
            return new ItemSellResult($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function buyItem(string $user_id, string $item_id, int $amount, string $maxPricePerItem)
    {
        $url = BASE_API_URL . "/marketplace/" . $user_id . "/buy/" . $item_id . "/" . $amount . "/" . $maxPricePerItem;

        try {
            return new ItemBuyResult($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}