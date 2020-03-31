<?php


namespace RavenfallBridge\Types;


class GUID
{
    private static $guid;

    public function __construct(string $guid)
    {
        self::$guid = $guid;
    }

    /**
     * @param string $guid
     * @return bool
     */
    private static function checkGUID(string $guid): bool
    {
        $re = '/[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}/';
        self::$guid = $guid;

        return (preg_match($re, $guid) === 1) ? true : false;
    }

    public function __toString()
    {
        return self::$guid;
    }
}
