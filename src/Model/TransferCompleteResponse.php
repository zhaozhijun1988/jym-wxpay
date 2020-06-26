<?php


namespace Jmy\Wxpay\Model;


use Jmy\Wxpay\Client;

class TransferCompleteResponse extends Response
{
    /**
     * @var $partnerTradeNo string
     */
    private $partnerTradeNo;

    /**
     * @var $paymentNo string
     */
    private $paymentNo;

    /**
     * @var $paymentTime \DateTimeImmutable
     */
    private $paymentTime;

    /**
     * @return string
     */
    public function getPartnerTradeNo()
    {
        return $this->partnerTradeNo;
    }

    /**
     * @param string $partnerTradeNo
     * @return TransferCompleteResponse
     */
    public function setPartnerTradeNo($partnerTradeNo)
    {
        $this->partnerTradeNo = $partnerTradeNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentNo()
    {
        return $this->paymentNo;
    }

    /**
     * @param string $paymentNo
     * @return TransferCompleteResponse
     */
    public function setPaymentNo($paymentNo)
    {
        $this->paymentNo = $paymentNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * @param $paymentTime
     * @return $this
     * @throws \Exception
     */
    public function setPaymentTime($paymentTime)
    {
        $this->paymentTime = new \DateTimeImmutable($paymentTime, new \DateTimeZone(Client::TIME_ZONE));
        return $this;
    }


}
