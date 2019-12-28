<?php


namespace RavenfallBridge;


class cURL
{
    private $curl_handler = null;

    private $curl_options = [];

    private $curl_url = "";

    private $curl_header = [];

    public function __construct(string $url = "", array $options = [], array $header = [])
    {
        $this->curl_handler = curl_init();
        $this->curl_url = $url;
        $this->curl_options = $options;
        $this->curl_header = $header;
    }

    /**
     * @return array
     */
    public function getCurlOptions(): array
    {
        return $this->curl_options;
    }

    /**
     * @param array $curl_options
     */
    public function setCurlOptions(array $curl_options): void
    {
        $this->curl_options = $curl_options;
    }

    /**
     * @return string
     */
    public function getCurlUrl(): string
    {
        return $this->curl_url;
    }

    /**
     * @param string $curl_url
     */
    public function setCurlUrl(string $curl_url): void
    {
        $this->curl_options = array_merge($this->curl_options, [
            CURLOPT_URL => $curl_url
        ]);

        $this->curl_url = $curl_url;
    }

    /**
     * @return array
     */
    public function getCurlHeader(): array
    {
        return $this->curl_header;
    }

    /**
     * @param array $curl_header
     */
    public function setCurlHeader(array $curl_header): void
    {
        $this->curl_options = array_merge($this->curl_options, [
            CURLOPT_HTTPHEADER => $curl_header,
        ]);
        $this->curl_header = $curl_header;
    }

    public function exec()
    {
        curl_setopt_array($this->curl_handler, $this->curl_options);
        return curl_exec($this->curl_handler);
    }

    public function error()
    {
        return curl_error($this->curl_handler);
    }

    public function errno()
    {
        return curl_errno($this->curl_handler);
    }

    public function __destruct()
    {
        curl_close($this->curl_handler);
    }
}