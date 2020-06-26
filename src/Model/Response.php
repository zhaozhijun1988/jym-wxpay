<?php


namespace Jmy\Wxpay\Model;


class Response
{

    const SUCCESS = 'SUCCESS';

    const FAIL = 'FAIL';

    /**
     * @var $returnCode string
     */
    private $returnCode;

    /**
     * @var $returnMsg string
     */
    private $returnMsg;

    /**
     * @var $resultCode string
     */
    private $resultCode;

    /**
     * @var $raw string | null
     */
    private $raw;

    /**
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @param string $returnCode
     * @return Response
     */
    public function setReturnCode($returnCode)
    {
        $this->returnCode = $returnCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnMsg()
    {
        return $this->returnMsg;
    }

    /**
     * @param string $returnMsg
     * @return Response
     */
    public function setReturnMsg($returnMsg)
    {
        $this->returnMsg = $returnMsg;
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
     * @return Response
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRaw(): ?string
    {
        return $this->raw;
    }

    /**
     * @param string|null $raw
     * @return Response
     */
    public function setRaw(?string $raw): Response
    {
        $this->raw = $raw;
        return $this;
    }

}
