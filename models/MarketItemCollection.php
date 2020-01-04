<?php


namespace RavenfallBridge\models;


class MarketItemCollection
{
    private $seller_user_id;
    private $item_id;
    private $amount;
    private $price_per_item;

    public function __construct(array $data)
    {
        $this->setSellerUserId($data['sellerUserId']);
        $this->setItemId($data['itemId']);
        $this->setAmount($data['amount']);
        $this->setPricePerItem($data['pricePerItem']);
    }

    /**
     * @return mixed
     */
    public function getSellerUserId()
    {
        return $this->seller_user_id;
    }

    /**
     * @param mixed $seller_user_id
     */
    public function setSellerUserId($seller_user_id): void
    {
        $this->seller_user_id = $seller_user_id;
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * @param mixed $item_id
     */
    public function setItemId($item_id): void
    {
        $this->item_id = $item_id;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getPricePerItem()
    {
        return $this->price_per_item;
    }

    /**
     * @param mixed $price_per_item
     */
    public function setPricePerItem($price_per_item): void
    {
        $this->price_per_item = $price_per_item;
    }
}