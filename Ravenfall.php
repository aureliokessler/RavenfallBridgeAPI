<?php
/**
 * Created by PhpStorm.
 * User: Aurelio
 * Date: 15.04.2018
 * Time: 21:22
 */

namespace RavenfallBridge;

use RavenfallBridge\models\AuthToken;

class Ravenfall extends Connect
{
    private $base_api_url = "https://ravenfall.stream/api";
    private $auth_token = null;

    /**
     * Ravenfall Authenticate Section
     */

    /**
     * Checks whether the authentication is still valid
     *
     * @return bool|string <p>
     *  true: is now authenticated
     *  false: is no longer authenticated
     *  string: is a error message from curl
     * </p>
     */
    public function AuthenticateState()
    {
        $url = $this->base_api_url . "/auth";

        try {
            return $this->get($url) == [""];
        } catch (\ErrorException $e) {
            Log::LogWrite("AuthenticateState", $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }

    }

    /**
     * Authenticate on ravenfall API
     *
     * @param string $username <p>
     *  your singup username on the https://ravenfall.stream website.
     * </p>
     * @param string $password <p>
     *  your singup password on the https://ravenfall.stream website.
     * </p>
     * @return bool|string <p>
     *  true: auth-token is stored.
     *  string: Error message.
     */
    public function Authenticate(string $username, string $password)
    {
        $url = $this->base_api_url . "/auth";

        $header = [
            "Content-Type" => "application/json"
        ];

        $data = [
            "username" => $username,
            "password" => $password
        ];

        try {
            $response = $this->post($url, $data, $header);
            new AuthToken($response);
            return true;
            // todo: store the $response (auth token infos) in a file or database.
        } catch (\ErrorException $e) {
            Log::LogWrite("Authenticate", $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * Ravenfall Game API Section
     */

    /**
     * @return bool|string
     */
    public function currentGameSession()
    {
        $url = $this->base_api_url . "/game";

        try {
            $response = $this->get($url);
            new GameSession($response);
            return true;
        } catch (\ErrorException $e) {
            Log::LogWrite("currentGameSession", $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function startGameSession()
    {
        $url = $this->base_api_url . "/game" . $this->client_version . "/" . $this->access_key;

        $header = [
            "Content-Type" => "application/json"
        ];

        try {
            $response = $this->get($url, $header);
            return true;
        } catch (\ErrorException $e) {
            Log::LogWrite("currentGameSession", $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function raidStreamer(string $username)
    {
        $url = $this->base_api_url . "/game/raid" . $username;

        $header = [
            "Content-Type" => "application/json"
        ];

        try {
            return $this->get($url, $header) == [""];
        } catch (\ErrorException $e) {
            Log::LogWrite("currentGameSession", $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }


}