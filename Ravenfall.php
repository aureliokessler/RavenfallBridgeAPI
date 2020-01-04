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
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }



    public function Authenticate()
    {
        $auth = new Authenticate();
        $this->base64_token = $auth->Login($this->username, $this->password);
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
}