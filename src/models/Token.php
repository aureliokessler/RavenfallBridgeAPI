<?php


namespace RavenfallBridge\models;


class Token
{
    private $user_id;
    private $issued_utc;
    private $expires_utc;
    private $token;
    private $expired;

    public function __construct(array $data)
    {
        $this->setUserId($data['userId']);
        $this->setIssuedUtc($data['issuedUtc']);
        $this->setExpiresUtc($data['expiresUtc']);
        $this->setToken($data['token'] ?? $data['authToken']);
        $this->setExpired($data['expired']);
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getIssuedUtc()
    {
        return $this->issued_utc;
    }

    /**
     * @param mixed $issuedUtc
     */
    public function setIssuedUtc($issuedUtc): void
    {
        $this->issued_utc = $issuedUtc;
    }

    /**
     * @return mixed
     */
    public function getExpiresUtc()
    {
        return $this->expires_utc;
    }

    /**
     * @param mixed $expiresUtc
     */
    public function setExpiresUtc($expiresUtc): void
    {
        $this->expires_utc = $expiresUtc;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @param mixed $expired
     */
    public function setExpired($expired): void
    {
        $this->expired = $expired;
    }
}