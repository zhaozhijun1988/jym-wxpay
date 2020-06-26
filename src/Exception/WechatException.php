<?php


namespace Jmy\Wxpay\Exception;


use Jmy\Wxpay\Request\RequestInterface;

class WechatException extends \Exception
{
    /** @var $request RequestInterface */
    private $request;

    private $response;

    public function __construct($message = "", RequestInterface $request = null, string $response = null)
    {
        parent::__construct($message);
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return $this->response;
    }

}
