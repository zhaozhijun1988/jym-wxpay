<?php


namespace Jmy\Wxpay\Model;


use Jmy\Wxpay\Client;

class TransferQueryResponse extends Response
{

    const STATUS_SUCCESS = 'SUCCESS';

    const STATUS_FAILED = 'FAILED';

    const STATUS_PROCESSING = 'PROCESSING';


    /**
     * @var $partnerTradeNo string
     */
    private $partnerTradeNo;

    /**
     * @var $appid string
     */
    private $appid;

    /**
     * @var $mchId string
     */
    private $mchId;

    /**
     * @var $detailId string
     */
    private $detailId;

    /**
     * @var $status string
     */
    private $status;

    /**
     * @var $reason string | null
     */
    private $reason;

    /**
     * @var $openid string
     */
    private $openid;

    /**
     * @var $transferName string | null
     */
    private $transferName;

    /**
     * @var $paymentAmount integer
     */
    private $paymentAmount;

    /**
     * @var $transferTime \DateTimeImmutable
     */
    private $transferTime;

    /**
     * @var $paymentTime \DateTimeImmutable
     */
    private $paymentTime;

    /**
     * @var $desc string
     */
    private $desc;

    /**
     * @return string
     */
    public function getPartnerTradeNo()
    {
        return $this->partnerTradeNo;
    }

    /**
     * @param string $partnerTradeNo
     * @return TransferQueryResponse
     */
    public function setPartnerTradeNo($partnerTradeNo)
    {
        $this->partnerTradeNo = $partnerTradeNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param string $appid
     * @return TransferQueryResponse
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMchId()
    {
        return $this->mchId;
    }

    /**
     * @param string $mchId
     * @return TransferQueryResponse
     */
    public function setMchId($mchId)
    {
        $this->mchId = $mchId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetailId()
    {
        return $this->detailId;
    }

    /**
     * @param string $detailId
     * @return TransferQueryResponse
     */
    public function setDetailId($detailId)
    {
        $this->detailId = $detailId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return TransferQueryResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string|null $reason
     * @return TransferQueryResponse
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * @param string $openid
     * @return TransferQueryResponse
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransferName()
    {
        return $this->transferName;
    }

    /**
     * @param string|null $transferName
     * @return TransferQueryResponse
     */
    public function setTransferName($transferName)
    {
        $this->transferName = $transferName;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param int $paymentAmount
     * @return TransferQueryResponse
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getTransferTime()
    {
        return $this->transferTime;
    }

    /**
     * @param $transferTime
     * @return $this
     * @throws \Exception
     */
    public function setTransferTime($transferTime)
    {
        $this->transferTime = new \DateTimeImmutable($transferTime, new \DateTimeZone(Client::TIME_ZONE));
        return $this;
    }

    /**
     * @return \DateTimeImmutable
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

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     * @return TransferQueryResponse
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

}
