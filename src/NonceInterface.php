<?php


namespace Jmy\Wxpay;


interface NonceInterface
{
    /**
     * @param int $len
     *
     * @return string
     */
    public function take(int $len): string;
}
