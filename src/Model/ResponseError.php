<?php


namespace Jmy\Wxpay\Model;


class ResponseError extends Response
{

    /**
     * @var $errCode string | null
     */
    private $errCode;

    /**
     * @var $errCodeDes string | null
     */
    private $errCodeDes;

    /**
     * @return string|null
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * @param string|null $errCode
     * @return ResponseError
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
     * @return ResponseError
     */
    public function setErrCodeDes($errCodeDes)
    {
        $this->errCodeDes = $errCodeDes;
        return $this;
    }


}
