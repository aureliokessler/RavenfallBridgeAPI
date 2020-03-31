<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\helpers\HBase64Token;
use RavenfallBridge\models\HighScoreCollection;

class HighScore extends Connect
{
    use HBase64Token;

    /**
     * get paged skill high score
     *
     * @param string $skill ?
     * @param int $offset ?
     * @param int $skip ?
     * @return HighScoreCollection|string <p>
     *  <b>HighScoreCollection</b>: a list of HighScore's data <br>
     *  <b>string</b>: error message from curl
     * </p>
     */
    public function getPagedSkillHighScore(string $skill, int $offset, int $skip)
    {
        $skill = $skill . isset($skill) ? "/" : "";

        $url = BASE_API_URL . "/highscore/paged/" . $skill . $offset . "/" . $skip;

        try {
            return new HighScoreCollection($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * @param int $offset ?
     * @param int $skip ?
     * @return HighScoreCollection|string
     *  <b>HighScoreCollection</b>: a list of HighScore data <br>
     *  <b>string</b>: error message from curl
     */
    public function getPagedHighScore(int $offset, int $skip)
    {
        return $this->getPagedSkillHighScore(null, $offset, $skip);
    }

    /**
     * @param string $skill ?
     * @return HighScoreCollection|string
     *  <b>HighScoreCollection</b>: a list of HighScore data <br>
     *  <b>string</b>: error message from curl
     */
    public function getSkillHighScore(string $skill)
    {
        $url = BASE_API_URL . "/highscore/" . isset($skill) ?? "";

        try {
            return new HighScoreCollection($this->get($url, $this->global_header));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * @return HighScoreCollection|string
     *  <b>HighScoreCollection</b>: a list of HighScore data <br>
     *  <b>string</b>: error message from curl
     */
    public function getHighScore()
    {
        return $this->getSkillHighScore(null);
    }
}