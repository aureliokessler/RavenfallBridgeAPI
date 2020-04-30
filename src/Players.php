<?php


namespace RavenfallBridge;

use ErrorException;
use RavenfallBridge\helpers\HBase64Token;
use RavenfallBridge\models\Player;
use RavenfallBridge\Types\GUID;

class Players extends Connect
{
    use HBase64Token;

    public function getCurrentPlayer()
    {
        $url = BASE_API_URL . "/players/user";

        try {
            return new Player($this->get($url));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function addPlayerToGameSession(int $userId)
    {
        $url = BASE_API_URL . "/players/" . $userId;

        $header = [
            "Content-Type: application/json"
        ];

        $data = [
            "Value" => false
        ];

        try {
            return new Player($this->post($url, $data, $header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function addItemToPlayer(int $userId, GUID $item)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/item/" . $item;

        try {
            return $this->get($url); // a number raw data come in.
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function unequipItem(int $userId, GUID $item)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/unequip/" . $item;

        try {
            return $this->get($url) == [true]; // a boolean raw data come in.
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function equipItem(int $userId, GUID $item)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/equip/" . $item;

        try {
            return $this->get($url) == [true]; // a boolean raw data come in.
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function updatePlayerAppearanceAsTwitchUser()
    {
        $url = BASE_API_URL . "/players/appearance";

        $header = [
            "Content-Type: application/json"
        ];

        $data = [
            "Value" => [0]
        ];

        try {
            return new Player($this->post($url, $data, $header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function updatePlayerExperience(int $userId)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/experience";

        $header = [
            "Content-Type: application/json"
        ];

        $data = [
            "Value" => [0]
        ];

        try {
            return new Player($this->post($url, $data, $header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function updatePlayerStatistics(int $userId)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/statistics";

        $header = [
            "Content-Type: application/json"
        ];

        $data = [
            "Value" => [0]
        ];

        try {
            return new Player($this->post($url, $data, $header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function updatePlayerResources(int $userId)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/resources";

        $header = [
            "Content-Type: application/json"
        ];

        $data = [
            "Value" => [0]
        ];

        try {
            return new Player($this->post($url, $data, $header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function giftItemToAnotherPlayer(int $userId, int $receiverUserId, GUID $item)
    {
        $url = BASE_API_URL . "/players/" . $userId . "/gift/" . $receiverUserId . "/" . $item;

        try {
            return $this->get($url) == [true]; // a boolean raw data come in.
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }


}