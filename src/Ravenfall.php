<?php
/**
 * Created by PhpStorm.
 * User: Aurelio
 * Date: 15.04.2018
 * Time: 21:22
 */

namespace RavenfallBridge;


class Ravenfall
{
    private $base64_token;

    private $username;
    private $password;

    /**
     * @param string $username <p>
     *  your singup username on the https://ravenfall.stream website
     * </p>
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $password <p>
     *  your singup password on the https://ravenfall.stream website
     * </p>
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function Authenticate()
    {
        $auth = new Authenticate();
        if (isset($this->username, $this->password)) {
            if (empty($this->base64_token)) {
                $this->base64_token = $auth->Login($this->username, $this->password);
            } else {
                Log::LogWrite(__METHOD__, "Active login!", __FILE__, __LINE__);
            }
        } else {
            Log::LogWrite(__METHOD__, "Username and/or Password not set.", __FILE__, __LINE__);
        }
        return $auth;
    }

    public function Game()
    {
        $game = new Game();
        $game->setBase64Token($this->base64_token);
        return $game;
    }

    public function HighScore()
    {
        $hs = new HighScore();
        $hs->setBase64Token($this->base64_token);
        return $hs;
    }

    public function Items()
    {
        $items = new Items();
        $items->setBase64Token($this->base64_token);
        return $items;
    }

    public function Marketplace()
    {
        $mp = new Marketplace();
        $mp->setBase64Token($this->base64_token);
        return $mp;
    }

    public function Players()
    {
        $p = new Players();
        $p->setBase64Token($this->base64_token);
        return $p;
    }

    public function Twitch()
    {
        $t = new Twitch();
        $t->setBase64Token($this->base64_token);
        return $t;
    }
}