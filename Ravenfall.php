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
    public function Authenticate(string $username, string $password)
    {
        return new Authenticate($username, $password);
    }

    public function Game()
    {
        return new Game();
    }

    public function HighScore()
    {
        return new HighScore();
    }

    public function Items()
    {
        return new Items();
    }
}