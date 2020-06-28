<?php

namespace Jmy\Wxpay;


use Jmy\Wxpay\Request\TransferRequest;

interface CashTransferInterface
{
    public function getTransferRequest():? TransferRequest;
}
