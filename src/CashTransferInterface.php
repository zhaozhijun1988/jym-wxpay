<?php


namespace Jmy\Wxpay;


interface CashTransferInterface
{
    public function getOpenId();

    public function getAmount();

    public function getDes();

    public function getPartnerTradeNo();
}
