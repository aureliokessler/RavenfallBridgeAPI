<?php

namespace RavenfallBridge;


require_once "constants.php";

use ErrorException;
use RavenfallBridge\models\Token;

class Authenticate extends Connect
{
    private $token;

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Authenticate to the ravenfall API
     *
     * @param string $username <p>
     *  your singup username on the https://ravenfall.stream website
     * </p>
     * @param string $password <p>
     *  your singup password on the https://ravenfall.stream website
     * </p>
     * @return bool|string <p>
     *  <b>true</b>: token data has been stored <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function Login(string $username, string $password)
    {
        $url = BASE_API_URL . "/auth";

        $header = [
            "Content-Type: application/json"
        ];

        $data = [
            "username" => $username,
            "password" => $password
        ];

        try {
            $response = $this->post($url, $data, $header);

            // todo: store the $response (auth token infos) in a file or database.
            $this->token = new Token($response);

            return base64_encode($this->RawData);
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * checks whether the authentication is still valid
     *
     * @return bool|string <p>
     *  <b>true</b>: is authenticated <br>
     *  <b>false</b>: no longer authenticated <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function State()
    {
        $url = BASE_API_URL . "/auth";

        try {
            $tmp = $this->get($url);
            var_dump($tmp);
            return $this->get($url) == [""];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}