<?php


namespace RavenfallBridge;


use ErrorException;
use RavenfallBridge\models\HighScoreCollection;

class HighScore extends Connect
{
    public function getPagedSkillHighScore(string $skill, int $offset, int $skip)
    {
        $skill = $skill . isset($skill) ? "/" : "";

        $url = BASE_API_URL . "/highscore/paged/" . $skill . $offset . "/" . $skip;

        try {
            new HighScoreCollection($this->get($url));
            return true;
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function getPagedHighScore(int $offset, int $skip)
    {
        return $this->getPagedSkillHighScore(null, $offset, $skip);
    }

    public function getSkillHighScore(string $skill)
    {
        $url = BASE_API_URL . "/highscore/paged/" . isset($skill) ?? "";

        try {
            new HighScoreCollection($this->get($url));
            return true;
        } catch (ErrorException $e) {
            Log::LogWrite(__METHOD__, $e->getMessage(), __FILE__, __LINE__);
            return $e->getMessage();
        }
    }

    public function GetHighScore()
    {
        return $this->getSkillHighScore(null);
    }
}