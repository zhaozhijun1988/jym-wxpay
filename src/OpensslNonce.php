<?php


namespace Jmy\Wxpay;


class OpensslNonce implements NonceInterface
{
    /**
     * @param int $len
     * @return string
     */
    public function take(int $len): string
    {
        return substr(strtr(base64_encode(openssl_random_pseudo_bytes((int) ((1 + $len) * 3 / 4))), '+/', '-_'), 0, $len);
    }
}
