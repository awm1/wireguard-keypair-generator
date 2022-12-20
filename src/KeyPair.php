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
        $this->privateKey = base64_encode(random_bytes(32));
        $this->publicKey = (new Curve25519())->getPublicKeyFromPrivateKey($this->privateKey);
    }

    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }
}
