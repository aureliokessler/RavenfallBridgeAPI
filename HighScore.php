<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\HighScoreCollection;

class HighScore extends Connect
{
    /**
     * get paged skill high score
     *
     * @param string $skill ?
     * @param int $offset ?
     * @param int $skip ?
     * @return HighScoreCollection|string
     *  HighScoreCollection is a HighScore array list
     *  string: error message from curl
     */
    public function getPagedSkillHighScore(string $skill, int $offset, int $skip)
    {
        $skill = $skill . isset($skill) ? "/" : "";

        $url = BASE_API_URL . "/highscore/paged/" . $skill . $offset . "/" . $skip;

        try {
            return new HighScoreCollection($this->get($url));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * @param int $offset ?
     * @param int $skip ?
     * @return HighScoreCollection|string
     *  HighScoreCollection is a HighScore array list
     *  string: error message from curl
     */
    public function getPagedHighScore(int $offset, int $skip)
    {
        return $this->getPagedSkillHighScore(null, $offset, $skip);
    }

    /**
     * @param string $skill ?
     * @return HighScoreCollection|string
     *  HighScoreCollection is a HighScore array list
     *  string: error message from curl
     */
    public function getSkillHighScore(string $skill)
    {
        $url = BASE_API_URL . "/highscore/" . isset($skill) ?? "";

        try {
            return new HighScoreCollection($this->get($url));
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    /**
     * @return HighScoreCollection|string
     *  HighScoreCollection is a HighScore array list
     *  string: error message from curl
     */
    public function getHighScore()
    {
        return $this->getSkillHighScore(null);
    }
}