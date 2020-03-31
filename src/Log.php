<?php
/**
 * Created by PhpStorm.
 * User: Aurelio
 * Date: 15.04.2018
 * Time: 21:22
 */

namespace RavenfallBridge;

class Log
{
    private const LOG_FILE =  "./ravenfall.log";

    /**
     * Write to Logfile.
     *
     * @param $log_type
     * @param $message
     * @param string $file <p>
     *  Set here __FILE__ to see the actual file what get log.
     * </p>
     * @param int $line <p>
     *  Set here __LINE__ to see the actual log file row nr. what get log.
     * </p>
     * @return bool
     */
    public static function LogWrite($log_type, $message, $file = __FILE__, $line = __LINE__)
    {
        if (!LOG_MESSAGES) return false;

        if (file_exists(self::LOG_FILE))
            $fp = fopen(self::LOG_FILE, "a");
        else
            $fp = fopen(self::LOG_FILE, "x"); // x param for writing and create file!

        $opt = "";
        if (__FILE__ != $file)
            $opt = " in " . $file . " on line " . $line;

        fwrite($fp, "[" . date("Y-m-d H:i:s") . "] [" . $log_type . "] " . $message . $opt . "\n");
        fclose($fp);

        return true;
    }
}