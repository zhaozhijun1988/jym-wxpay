<?php


namespace Jmy\Wxpay\Model;


class TransferInCompleteResponse extends Response
{

    const SYSTEM_ERROR = 'SYSTEMERROR';

    const AMOUNT_LIMIT = 'AMOUNT_LIMIT';

    const SEND_FAILED = 'SEND_FAILED';

    const NOT_ENOUGH = 'NOTENOUGH';

    const MONEY_LIMIT = 'MONEY_LIMIT';

    const CA_ERROR = 'CA_ERROR';

    const SENDNUM_LIMIT = 'SENDNUM_LIMIT';

    /**
     * @var $mchAppid string
     */
    private $mchAppid;

    /**
     * @var $mchid string
     */
    private $mchid;

    /**
     * @var $deviceInfo string | null
     */
    private $deviceInfo;

    /**
     * @var $nonceStr string
     */
    private $nonceStr;

    /**
     * @var $resultCode string
     */
    private $resultCode;

    /**
     * @var $errCode string | null
     */
    private $errCode;

    /**
     * @var $errCodeDes string | null
     */
    private $errCodeDes;

    /**
     * @return string
     */
    public function getMchAppid()
    {
        return $this->mchAppid;
    }

    /**
     * @param string $mchAppid
     * @return TransferInCompleteResponse
     */
    public function setMchAppid($mchAppid)
    {
        $this->mchAppid = $mchAppid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMchid()
    {
        return $this->mchid;
    }

    /**
     * @param string $mchid
     * @return TransferInCompleteResponse
     */
    public function setMchid($mchid)
    {
        $this->mchid = $mchid;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeviceInfo()
    {
        return $this->deviceInfo;
    }

    /**
     * @param string|null $deviceInfo
     * @return TransferInCompleteResponse
     */
    public function setDeviceInfo($deviceInfo)
    {
        $this->deviceInfo = $deviceInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNonceStr()
    {
        return $this->nonceStr;
    }

    /**
     * @param string $nonceStr
     * @return TransferInCompleteResponse
     */
    public function setNonceStr($nonceStr)
    {
        $this->nonceStr = $nonceStr;
        return $this;
    }

    /**
     * @return string
     */
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * @param string $resultCode
     * @return TransferInCompleteResponse
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * @param string|null $errCode
     * @return TransferInCompleteResponse
     */
    public function setErrCode($errCode)
    {
        $this->errCode = $errCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrCodeDes()
    {
        return $this->errCodeDes;
    }

    /**
     * @param string|null $errCodeDes
     * @return TransferInCompleteResponse
     */
    public function setErrCodeDes($errCodeDes)
    {
        $this->errCodeDes = $errCodeDes;
        return $this;
    }

}
