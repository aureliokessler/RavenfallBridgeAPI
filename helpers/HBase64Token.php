<?php


namespace RavenfallBridge\helpers;


trait HBase64Token
{
    private $global_header;

    /**
     * @param string $base64_token
     */
    public function setBase64Token(string $base64_token): void
    {
        $this->global_header = [
            "auth-token" => $base64_token
        ];
    }
}