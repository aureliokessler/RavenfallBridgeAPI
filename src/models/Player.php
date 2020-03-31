<?php


namespace RavenfallBridge\models;


class Player
{
    private $user_id;
    private $user_name;
    private $name;
    private $statistics;
    private $appearance;
    private $resources;
    private $skills;
    private $inventory_items;
    private $local;
    private $originUser_id;
    private $revision;

    public function __construct(array $data)
    {
        $this->setUserId($data['userId']);
        $this->setUserName($data['userName']);
        $this->setName($data['name']);
        $this->setStatistics($data['statistics']);
        $this->setAppearance($data['appearance']);
        $this->setResources($data['resources']);
        $this->setSkills($data['skills']);
        $this->setInventoryItems($data['inventoryItems']);
        $this->setLocal($data['local']);
        $this->setOriginUserId($data['originUserId']);
        $this->setRevision($data['revision']);
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name): void
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * @param mixed $statistics
     */
    public function setStatistics($statistics): void
    {
        $this->statistics = $statistics;
    }

    /**
     * @return mixed
     */
    public function getAppearance()
    {
        return $this->appearance;
    }

    /**
     * @param mixed $appearance
     */
    public function setAppearance($appearance): void
    {
        $this->appearance = $appearance;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param mixed $resources
     */
    public function setResources($resources): void
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @return mixed
     */
    public function getInventoryItems()
    {
        return $this->inventory_items;
    }

    /**
     * @param mixed $inventory_items
     */
    public function setInventoryItems($inventory_items): void
    {
        $this->inventory_items = $inventory_items;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local): void
    {
        $this->local = $local;
    }

    /**
     * @return mixed
     */
    public function getOriginUserId()
    {
        return $this->originUser_id;
    }

    /**
     * @param mixed $originUser_id
     */
    public function setOriginUserId($originUser_id): void
    {
        $this->originUser_id = $originUser_id;
    }

    /**
     * @return mixed
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * @param mixed $revision
     */
    public function setRevision($revision): void
    {
        $this->revision = $revision;
    }

    public function toArray()
    {
        return [
            $this->getUserId(),
            $this->getUserName(),
            $this->getName(),
            $this->getStatistics(),
            $this->getAppearance(),
            $this->getResources(),
            $this->getSkills(),
            $this->getInventoryItems(),
            $this->getLocal(),
            $this->getOriginUserId(),
            $this->getRevision()
        ];
    }

    public function toJSON()
    {
        return json_encode($this->toArray());
    }
}