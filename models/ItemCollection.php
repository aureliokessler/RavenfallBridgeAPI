<?php


namespace RavenfallBridge\models;


class ItemCollection
{
    private $id;
    private $name;
    private $level;
    private $weapon_aim;
    private $weapon_power;
    private $armor_power;
    private $required_attack_level;
    private $required_defense_level;
    private $category;
    private $type;
    private $material;
    private $maleModelId;
    private $female_model_id;
    private $generic_prefab;
    private $male_prefab;
    private $female_prefab;
    private $is_generic_model;
    private $craftable;
    private $required_crafting_level;
    private $wood_cost;
    private $ore_cost;

    public function __construct(array $data)
    {
        $this->setId($data['id']);
        $this->setName($data['name']);
        $this->setLevel($data['level']);
        $this->setWeaponAim($data['weaponAim']);
        $this->setWeaponPower($data['weaponPower']);
        $this->setArmorPower($data['armorPower']);
        $this->setRequiredAttackLevel($data['requiredAttackLevel']);
        $this->setRequiredDefenseLevel($data['requiredDefenseLevel']);
        $this->setCategory($data['category']);
        $this->setType($data['type']);
        $this->setMaterial($data['material']);
        $this->setMaleModelId($data['maleModelId']);
        $this->setFemaleModelId($data['femaleModelId']);
        $this->setGenericPrefab($data['genericPrefab']);
        $this->setMalePrefab($data['malePrefab']);
        $this->setFemalePrefab($data['femalePrefab']);
        $this->setIsGenericModel($data['isGenericModel']);
        $this->setCraftable($data['craftable']);
        $this->setRequiredCraftingLevel($data['requiredCraftingLevel']);
        $this->setWoodCost($data['woodCost']);
        $this->setOreCost($data['oreCost']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level): void
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getWeaponAim()
    {
        return $this->weapon_aim;
    }

    /**
     * @param mixed $weapon_aim
     */
    public function setWeaponAim($weapon_aim): void
    {
        $this->weapon_aim = $weapon_aim;
    }

    /**
     * @return mixed
     */
    public function getWeaponPower()
    {
        return $this->weapon_power;
    }

    /**
     * @param mixed $weapon_power
     */
    public function setWeaponPower($weapon_power): void
    {
        $this->weapon_power = $weapon_power;
    }

    /**
     * @return mixed
     */
    public function getArmorPower()
    {
        return $this->armor_power;
    }

    /**
     * @param mixed $armor_power
     */
    public function setArmorPower($armor_power): void
    {
        $this->armor_power = $armor_power;
    }

    /**
     * @return mixed
     */
    public function getRequiredAttackLevel()
    {
        return $this->required_attack_level;
    }

    /**
     * @param mixed $required_attack_level
     */
    public function setRequiredAttackLevel($required_attack_level): void
    {
        $this->required_attack_level = $required_attack_level;
    }

    /**
     * @return mixed
     */
    public function getRequiredDefenseLevel()
    {
        return $this->required_defense_level;
    }

    /**
     * @param mixed $required_defense_level
     */
    public function setRequiredDefenseLevel($required_defense_level): void
    {
        $this->required_defense_level = $required_defense_level;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material): void
    {
        $this->material = $material;
    }

    /**
     * @return mixed
     */
    public function getMaleModelId()
    {
        return $this->maleModelId;
    }

    /**
     * @param mixed $maleModelId
     */
    public function setMaleModelId($maleModelId): void
    {
        $this->maleModelId = $maleModelId;
    }

    /**
     * @return mixed
     */
    public function getFemaleModelId()
    {
        return $this->female_model_id;
    }

    /**
     * @param mixed $female_model_id
     */
    public function setFemaleModelId($female_model_id): void
    {
        $this->female_model_id = $female_model_id;
    }

    /**
     * @return mixed
     */
    public function getGenericPrefab()
    {
        return $this->generic_prefab;
    }

    /**
     * @param mixed $generic_prefab
     */
    public function setGenericPrefab($generic_prefab): void
    {
        $this->generic_prefab = $generic_prefab;
    }

    /**
     * @return mixed
     */
    public function getMalePrefab()
    {
        return $this->male_prefab;
    }

    /**
     * @param mixed $male_prefab
     */
    public function setMalePrefab($male_prefab): void
    {
        $this->male_prefab = $male_prefab;
    }

    /**
     * @return mixed
     */
    public function getFemalePrefab()
    {
        return $this->female_prefab;
    }

    /**
     * @param mixed $female_prefab
     */
    public function setFemalePrefab($female_prefab): void
    {
        $this->female_prefab = $female_prefab;
    }

    /**
     * @return mixed
     */
    public function getIsGenericModel()
    {
        return $this->is_generic_model;
    }

    /**
     * @param mixed $is_generic_model
     */
    public function setIsGenericModel($is_generic_model): void
    {
        $this->is_generic_model = $is_generic_model;
    }

    /**
     * @return mixed
     */
    public function getCraftable()
    {
        return $this->craftable;
    }

    /**
     * @param mixed $craftable
     */
    public function setCraftable($craftable): void
    {
        $this->craftable = $craftable;
    }

    /**
     * @return mixed
     */
    public function getRequiredCraftingLevel()
    {
        return $this->required_crafting_level;
    }

    /**
     * @param mixed $required_crafting_level
     */
    public function setRequiredCraftingLevel($required_crafting_level): void
    {
        $this->required_crafting_level = $required_crafting_level;
    }

    /**
     * @return mixed
     */
    public function getWoodCost()
    {
        return $this->wood_cost;
    }

    /**
     * @param mixed $wood_cost
     */
    public function setWoodCost($wood_cost): void
    {
        $this->wood_cost = $wood_cost;
    }

    /**
     * @return mixed
     */
    public function getOreCost()
    {
        return $this->ore_cost;
    }

    /**
     * @param mixed $ore_cost
     */
    public function setOreCost($ore_cost): void
    {
        $this->ore_cost = $ore_cost;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'level' => $this->getLevel(),
            'weaponAim' => $this->getWeaponAim(),
            'weaponPower' => $this->getWeaponPower(),
            'armorPower' => $this->getArmorPower(),
            'requiredAttackLevel' => $this->getRequiredAttackLevel(),
            'requiredDefenseLevel' => $this->getRequiredDefenseLevel(),
            'category' => $this->getCategory(),
            'type' => $this->getType(),
            'material' => $this->getMaterial(),
            'maleModelId' => $this->getMaleModelId(),
            'femaleModelId' => $this->getFemaleModelId(),
            'genericPrefab' => $this->getGenericPrefab(),
            'malePrefab' => $this->getMalePrefab(),
            'femalePrefab' => $this->getFemalePrefab(),
            'isGenericModel' => $this->getIsGenericModel(),
            'craftable' => $this->getCraftable(),
            'requiredCraftingLevel' => $this->getRequiredCraftingLevel(),
            'woodCost' => $this->getWoodCost(),
            'oreCost' => $this->getOreCost()
        ];
    }
}