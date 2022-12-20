<?php

namespace awm1;

use deemru\Curve25519;

class KeyPair
{
    private string $privateKey;
    private string $publicKey;

    /**
     * @throws \Exception if an appropriate source of randomness cannot be found.
     */
    public function __construct()
    {
        $this->privateKey = random_bytes(32);
        $this->publicKey = (new Curve25519())->getPublicKeyFromPrivateKey($this->privateKey);
    }

    public function getPrivateKey(): string
    {
        return base64_encode($this->privateKey);
    }

    public function getPublicKey(): string
    {
        return base64_encode($this->publicKey);
    }
}
