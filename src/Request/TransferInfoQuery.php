<?php


namespace Jmy\Wxpay\Request;


class TransferInfoQuery implements RequestInterface, \JsonSerializable
{
    /**
     * @var $partnerTradeNo string
     */
    private $partnerTradeNo;

    /**
     * @var $appId string
     */
    private $appId;

    /**
     * @var $merchantId string
     */
    private $merchantId;

    /**
     * @return string
     */
    public function getPartnerTradeNo()
    {
        return $this->partnerTradeNo;
    }

    /**
     * @param string $partnerTradeNo
     * @return TransferInfoQuery
     */
    public function setPartnerTradeNo($partnerTradeNo)
    {
        $this->partnerTradeNo = $partnerTradeNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     * @return TransferInfoQuery
     */
    public function setAppId(string $appId): TransferInfoQuery
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     * @return TransferInfoQuery
     */
    public function setMerchantId(string $merchantId): TransferInfoQuery
    {
        $this->merchantId = $merchantId;
        return $this;
    }


    public function jsonSerialize()
    {
        return $this->getOptions();
    }


    public function getOptions()
    {
       return [
           'partner_trade_no' => $this->getPartnerTradeNo(),
           'appid' => $this->getAppId(),
           'mch_id' => $this->getMerchantId()
       ];
    }

}
