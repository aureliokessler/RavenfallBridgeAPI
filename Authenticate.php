<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\Token;

class Authenticate extends Connect
{
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
     *  true: token data has been stored
     *  string: error message from curl
     */
    public function __construct(string $username, string $password)
    {
        $url = BASE_API_URL . "/auth";

        $header = [
            "Content-Type" => "application/json"
        ];

        $data = [
            "username" => $username,
            "password" => $password
        ];

        try {
            $response = $this->post($url, $data, $header);
            new Token($response);
            return true;
            // todo: store the $response (auth token infos) in a file or database.
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * checks whether the authentication is still valid
     *
     * @return bool|string <p>
     *  true: is authenticated
     *  false: no longer authenticated
     *  string: error message from curl
     * </p>
     */
    public function State()
    {
        $url = BASE_API_URL . "/auth";

        try {
            return $this->get($url) == [""];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}