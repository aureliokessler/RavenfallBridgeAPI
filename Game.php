<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\helpers\HBase64Token;
use RavenfallBridge\models\EventCollection;
use RavenfallBridge\models\GameInfo;

class Game extends Connect
{
    use HBase64Token;

    /**
     * retrieves the currently running game session information
     *
     * @return GameInfo|string <p>
     *  <b>GameInfo</b>: the information of the current game <br>
     *  <b>string</b>: error message from curl
     * <7p>
     */
    public function currentSession()
    {
        $url = BASE_API_URL . "/game";

        try {
            return new GameInfo($this->get($url));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * start a game session
     *
     * @param string $clientVersion ravenfall client version
     * @param string $accessKey client secret
     * @return bool|string <p>
     *  <b>true</b>: token for game session has been stored <br>
     *  <b>string</b>: error message from curl
     * </p>
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
            $this->post($url, $data, $header);
            // new Token($this->post($url, $data, $header));
            // todo: the game sessions token has yet to be saved
            return base64_encode($this->RawData);
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * raiding another streamer
     *
     * @param string $username Twitch username/display name
     * @return bool|string <p>
     *  <b>true</b>: streamer could be raided <br>
     *  <b>false</b>: streamer could not be raided <br>
     *  <b>string</b>: error message from curl
     * </p>
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
            return $this->delete($url, $data, array_merge($this->global_header, $header)) == [true];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * session is deleted
     *
     * @return bool|string <p>
     *  <b>true</b>: session has been deleted <br>
     *  <b>false</b>: session could not be deleted <br>
     *  <b>string</b>: error message from curl
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
            return $this->delete($url, $data, array_merge($this->global_header, $header)) == [[]];
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * poll the latest game events after a specific revision
     *
     * @param int $revision
     * @return EventCollection|string <p>
     *  <b>EventCollection</b>: A list of ravenfall events <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function pollEvent(int $revision)
    {
        $url = BASE_API_URL . "/game/events/" . $revision;

        try {
            return new EventCollection($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }
}