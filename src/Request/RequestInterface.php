<?php


namespace Jmy\Wxpay\Request;


interface RequestInterface
{
    public function getOptions();

    public function setMerchantId(string $merchantId);

    public function setAppId(string $appId);
}
