<?php
/**
 * Created by PhpStorm.
 * User: Aurelio
 * Date: 23.05.2018
 * Time: 19:31
 */

namespace RavenfallBridge;

use ErrorException;

class Connect
{
    protected $RawData = null;


    /**
     * Send $data to $url with http post Method
     *
     * @param string $url request your data to
     * @param array $data API request data
     * @param array $header http header options
     * @return array API request data
     * @throws ErrorException
     */
    protected function post(string $url, array $data, array $header = []): array
    {
        if (empty($data)) {
            Log::LogWrite("POST", "No Data in \$data array. (" . implode(", ", $data) . ")", __FILE__, __LINE__);
            throw new ErrorException("No Data in \$data array.");
        }

        return $this->send($url, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
        ], $header);
    }

    /**
     * Send get data with the $url to $url
     *
     * @param string $url Request your data with params to
     * @param array $header http header options
     * @return array API request data
     * @throws ErrorException
     */
    protected function get(string $url, array $header = []): array
    {
        return $this->send($url, [
            CURLOPT_ENCODING => ""
        ], $header);
    }

    /**
     * Deleting a resource with the $url
     *
     * @param string $url request your data to
     * @param array $data API request data
     * @param array $header http header options
     * @return array API request data.
     * @throws ErrorException
     */
    protected function delete(string $url, array $data, $header = []): array
    {
        return $this->send($url, [
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => $data
        ], $header);
    }

    /**
     * Put a resource
     *
     * @param string $url request your data to
     * @param array $data API request data
     * @param array $header http header options
     * @return array API request data
     * @throws ErrorException
     */
    protected function put(string $url, array $data, array $header): array
    {
        return $this->send($url, [
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $data
        ], $header);
    }

    /**
     * Send data in different form to a $url with a specific $header
     *
     * @param string $url Request your data with params to
     * @param array $curl_opt cURL Options
     * @param array $header http header options
     * @return array API request data
     * @throws ErrorException
     */
    private function send(string $url, array $curl_opt, array $header = [])
    {
        $curl = new cURL($url, [CURLOPT_RETURNTRANSFER => true] + $curl_opt, $header);

        $content = $curl->exec();

        if ($content === false) {
            $error_message = "(" . $curl->errno() . ") " . $curl->error();
            Log::LogWrite("cURL Error", $error_message, __FILE__, __LINE__);
            throw new ErrorException("cURL Error: " . $error_message);
        }

        $this->RawData = $content;
        $json = json_decode($content, true);
        var_dump($json);
        return json_decode($content, true);
    }
}