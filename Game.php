<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\EventCollection;
use RavenfallBridge\models\GameInfo;
use RavenfallBridge\models\Token;

class Game extends Connect
{
    /**
     * retrieves the currently running game session
     *
     * @return bool|string
     *  true: Game session data has been stored
     *  string: error message from curl
     */
    public function currentSession()
    {
        $url = BASE_API_URL . "/game";

        try {
            new GameInfo($this->get($url));
            return true;
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * start a game session
     *
     * @param string $clientVersion
     * @param string $accessKey
     * @return bool|string
     *  true: token for game session has been stored
     *  string: error message from curl
     */
    public function startSession(string $clientVersion, string $accessKey)
    {
        $url = BASE_API_URL . "/game" . $clientVersion . "/" . $accessKey;

        $header = [
            "Content-Type" => "application/json"
        ];

        $data = [
            "Value" => false
        ];

        try {
            new Token($this->post($url, $data, $header));
            // todo: the game sessions token has yet to be saved
            return true;
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * raiding another streamer
     *
     * @param string $username <p>
     *  Twitch username
     * </p>
     * @return bool|string
     *  true: streamer could be raided
     *  false: streamer could not be raided
     *  string: error message from curl
     */
    public function raidStreamer(string $username)
    {
        $url = BASE_API_URL . "/game/raid" . $username;

        $header = [
            "Content-Type" => "application/json"
        ];

        $data = [
            "Value" => false
        ];

        try {
            return $this->delete($url, $data, $header) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * session is deleted
     *
     * @return bool|string <p>
     *  true: session has been deleted
     *  false: session could not be deleted
     *  string: error message from curl
     * </p>
     */
    public function endSession()
    {
        $url = BASE_API_URL . "/game";

        $header = [
            "Content-Type" => "application/json"
        ];

        $data = [];

        try {
            return $this->delete($url, $data, $header) == [];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * poll the latest game events after a specific revision
     *
     * @param int $revision
     * @return string <p>
     *  true: the latest game events have been successfully received
     *  string: error message from curl
     * </p>
     */
    public function pollEvent(int $revision)
    {
        $url = BASE_API_URL . "/game/events/" . $revision;

        try {
            new EventCollection($this->get($url));
            return true;
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

}