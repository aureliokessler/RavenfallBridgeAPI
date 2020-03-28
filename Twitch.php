<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\helpers\HBase64Token;

class Twitch extends Connect
{
    use HBase64Token;

    public function setTwitchAccessToken()
    {
        $url = BASE_API_URL . "/twitch/session";

        try {
            return $this->get($url);
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function getAccessTokenRequestURL()
    {
        $url = BASE_API_URL . "/twitch/access";

        try {
            return $this->get($url);
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function getTwitchUser()
    {
        $url = BASE_API_URL . "/twitch/user";

        try {
            return $this->get($url);
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}