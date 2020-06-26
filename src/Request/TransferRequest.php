<?php


namespace Jmy\Wxpay\Request;


/**
 * Class TransferRequest
 * @package Jmy\Wxpay\Request
 * @see https://pay.weixin.qq.com/wiki/doc/api/tools/mch_pay.php?chapter=14_2
 */
class TransferRequest implements \JsonSerializable, RequestInterface
{

    const CHECK_NAME_NO_CHECK = 'NO_CHECK';

    const CHECK_NAME_FORCE_CHECK = 'FORCE_CHECK';

    /**
     * @var $deivceInfo string | null
     */
    private $deivceInfo;

    /**
     * @var $partnerTradeNo string
     */
    private $partnerTradeNo;

    /**
     * @var $openid string
     */
    private $openid;

    /**
     * @var $checkName string
     */
    private $checkName;

    /**
     * @var $reUsername string | null
     */
    private $reUsername;

    /**
     * @var $amount integer
     */
    private $amount;

    /**
     * @var $desc string
     */
    private $desc;

    /**
     * @var $spbillcreateIp string | null
     */
    private $spbillcreateIp;

    /**
     * @var $appId string
     */
    private $appId;


    /**
     * @var $merchantId string
     */
    private $merchantId;

    public function __construct()
    {
        $this->checkName = self::CHECK_NAME_NO_CHECK;
    }

    /**
     * @return string|null
     */
    public function getDeivceInfo()
    {
        return $this->deivceInfo;
    }

    /**
     * @param string|null $deivceInfo
     * @return TransferRequest
     */
    public function setDeivceInfo($deivceInfo)
    {
        $this->deivceInfo = $deivceInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getPartnerTradeNo()
    {
        return $this->partnerTradeNo;
    }

    /**
     * @param string $partnerTradeNo
     * @return TransferRequest
     */
    public function setPartnerTradeNo($partnerTradeNo)
    {
        $this->partnerTradeNo = $partnerTradeNo;
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
     * @return TransferRequest
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCheckName()
    {
        return $this->checkName;
    }

    /**
     * @param string $checkName
     * @return TransferRequest
     */
    public function setCheckName($checkName)
    {
        $this->checkName = $checkName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReUsername()
    {
        return $this->reUsername;
    }

    /**
     * @param string|null $reUsername
     * @return TransferRequest
     */
    public function setReUsername($reUsername)
    {
        $this->reUsername = $reUsername;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return TransferRequest
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
     * @return TransferRequest
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSpbillcreateIp()
    {
        return $this->spbillcreateIp;
    }

    /**
     * @param string|null $spbillcreateIp
     * @return TransferRequest
     */
    public function setSpbillcreateIp($spbillcreateIp)
    {
        $this->spbillcreateIp = $spbillcreateIp;
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
     * @return TransferRequest
     */
    public function setAppId(string $appId): TransferRequest
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
     * @return TransferRequest
     */
    public function setMerchantId(string $merchantId): TransferRequest
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
        return array_filter([
            'device_info' => $this->getDeivceInfo(),
            'partner_trade_no' => $this->getPartnerTradeNo(),
            'openid' => $this->getOpenid(),
            'check_name' => $this->getCheckName(),
            're_user_name' => $this->getReUsername(),
            'amount' => $this->getAmount(),
            'desc' => $this->getDesc(),
            'spbill_create_ip' => $this->getSpbillcreateIp(),
            'mch_appid' => $this->getAppId(),
            'mchid' => $this->getMerchantId()
        ]);
    }

}
