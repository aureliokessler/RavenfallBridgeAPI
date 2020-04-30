<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\helpers\HBase64Token;
use RavenfallBridge\models\ItemBuyResult;
use RavenfallBridge\models\ItemSellResult;
use RavenfallBridge\models\MarketItemCollection;
use RavenfallBridge\Types\GUID;

class Marketplace extends Connect
{
    use HBase64Token;

    /**
     * Retrieves the Marketplace Collection
     *
     * @param int $offset
     * @param int $size
     * @return MarketItemCollection|string <p>
     *  <b>MarketItemCollection</b>: A list of marketplace items <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function getListing(int $offset, int $size)
    {
        $url = BASE_API_URL . "/marketplace/" . $offset . "/" . $size;

        try {
            return new MarketItemCollection( [ $this->get( $url, $this->global_header ) ] );
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * sell an item from your item collection
     *
     * @param string $user_id is a twitch user id
     * @param GUID $item_id
     * @param int $amount
     * @param string $price_per_item is a Decimal
     * @return ItemSellResult|string <p>
     *  <b>ItemSellResult</b>: the returned result from the sale <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function sellItem(string $user_id, GUID $item_id, int $amount, string $price_per_item)
    {
        $url = BASE_API_URL . "/marketplace/" . $user_id . "/sell/" . $item_id . "/". $amount . "/" .$price_per_item;

        try {
            return new ItemSellResult($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * Buy an item in the marketplace
     *
     * @param string $user_id is a twitch user id
     * @param GUID $item_id
     * @param int $amount
     * @param string $maxPricePerItem is a Decimal
     * @return ItemBuyResult|string <p>
     *  <b>ItemBuyResult</b>: the returned result from the buy <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function buyItem(string $user_id, GUID $item_id, int $amount, string $maxPricePerItem)
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