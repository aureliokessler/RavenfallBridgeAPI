<?php


namespace RavenfallBridge\models;


class ItemBuyResult
{
    private $state;
    private $amount_bought;
    private $cost_per_item;
    private $total_amount;
    private $total_cost;

    public function __construct(array $data)
    {
        $this->setState($data['state']);
        $this->setAmountBought($data['amountBought']);
        $this->setCostPerItem($data['costPerItem']);
        $this->setTotalAmount($data['totalAmount']);
        $this->setTotalCost($data['totalCost']);
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

    /**
     * @return mixed
     */
    public function getAmountBought()
    {
        return $this->amount_bought;
    }

    /**
     * @param mixed $amount_bought
     */
    public function setAmountBought($amount_bought): void
    {
        $this->amount_bought = $amount_bought;
    }

    /**
     * @return mixed
     */
    public function getCostPerItem()
    {
        return $this->cost_per_item;
    }

    /**
     * @param mixed $cost_per_item
     */
    public function setCostPerItem($cost_per_item): void
    {
        $this->cost_per_item = $cost_per_item;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * @param mixed $total_amount
     */
    public function setTotalAmount($total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return mixed
     */
    public function getTotalCost()
    {
        return $this->total_cost;
    }

    /**
     * @param mixed $total_cost
     */
    public function setTotalCost($total_cost): void
    {
        $this->total_cost = $total_cost;
    }


}