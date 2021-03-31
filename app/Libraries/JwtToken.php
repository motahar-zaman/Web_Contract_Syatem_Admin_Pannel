<?php

namespace App\Libraries;
use JWT;

require_once 'JWT.php';

class JwtToken
{
    PRIVATE $key = "k1_jwt_user_token";
    private $algorithm = "HS512";

    public function generateToken($data)
    {
        return JWT::encode($data, $this->key, $this->algorithm);
    }

    public function decodeToken($token)
    {
        $decoded = JWT::decode($token, $this->key, array($this->algorithm));
        return (array) $decoded;
    }
}