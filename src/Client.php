<?php


namespace Jmy\Wxpay;


use Jmy\Wxpay\Exception\TransferException;
use Jmy\Wxpay\Exception\WechatException;
use Jmy\Wxpay\Model\Response;
use Jmy\Wxpay\Model\TransferCompleteResponse;
use Jmy\Wxpay\Model\TransferInCompleteResponse;
use Jmy\Wxpay\Model\TransferQueryResponse;
use Jmy\Wxpay\Request\RequestInterface;
use Jmy\Wxpay\Request\TransferInfoQuery;
use Jmy\Wxpay\Request\TransferRequest;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use GuzzleHttp\ClientInterface as Guzzle;

class Client
{
    const TIME_ZONE = 'Asia/Shanghai';

    const BASE_URI = 'https://api.mch.weixin.qq.com';

    private $appId;

    private $merchantId;

    private $secret;

    private $certificate;

    private $privKey;

    private $nonce;

    private $logger;

    private $guzzle;

    private $serializer;

    public function __construct(string $appId, string $merchantId, string $secret, string $certificate, string $privKey, NonceInterface $nonce, Guzzle $guzzle, LoggerInterface $logger)
    {
        $this->appId = $appId;
        $this->merchantId = $merchantId;
        $this->secret = $secret;
        $this->certificate = $certificate;
        $this->privKey = $privKey;
        $this->nonce = $nonce;
        $this->logger= $logger;
        $this->guzzle = $guzzle;
        $this->serializer = new Serializer(
            [new ObjectNormalizer()],
            [new XmlEncoder(), new JsonEncoder()]
        );
    }

    /**
     * https://pay.weixin.qq.com/wiki/doc/api/tools/mch_pay.php?chapter=14_2
     * @param TransferRequest $request
     * @return TransferCompleteResponse|TransferInCompleteResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transfer(TransferRequest $request)
    {
        $response  = $this->request('/mmpaymkttransfers/promotion/transfers', $request, true, TransferException::class);
        if ($response->getReturnCode() === Response::SUCCESS && $response->getResultCode() === Response::SUCCESS) {
            return $this->serializer->deserialize($response->getRaw(), TransferCompleteResponse::class, 'xml');
        }
        return $this->serializer->deserialize($response->getRaw(), TransferInCompleteResponse::class, 'xml');
    }

    /**
     * https://pay.weixin.qq.com/wiki/doc/api/tools/mch_pay.php?chapter=14_3
     * @param TransferInfoQuery $query
     * @return TransferQueryResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findTransfer(TransferInfoQuery $query)
    {
        $response = $this->request('/mmpaymkttransfers/gettransferinfo', $query, true, TransferException::class);
        return $this->serializer->deserialize($response->getRaw(), TransferQueryResponse::class, 'xml');
    }


    /**
     * @param string $uri
     * @param RequestInterface $request
     * @param bool $secure
     * @param WechatException|null $exception
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $uri, RequestInterface $request, bool $secure = false, string $exception = WechatException::class)
    {
        $request->setAppId($this->appId);
        $request->setMerchantId($this->merchantId);
        $params = array_merge([
            'nonce_str' => $this->nonce->take(16),
        ], $request->getOptions());

        $body = $this
            ->guzzle
            ->request('POST', $uri, array_merge(
                [
                    'headers' => ['Content-type' => 'text/xml; charset="utf-8"'],
                    'body'    => $this->envelop($params),
                ],
                $secure ? [
                    'cert'    => $this->certificate,
                    'ssl_key' => $this->privKey,
                ] : [
                ]
            ))
            ->getBody()
            ->getContents()
        ;
        $this->logger->debug($body);
        /** @var Response $response */
        $response = $this->serializer->deserialize($body, Response::class, 'xml');

        if ($response->getReturnCode() !== Response::SUCCESS) {
            $this->logger->error('wechat return code error');
            $this->logger->error(json_encode($params));
            $this->logger->error($body);
            throw new $exception($response->getReturnMsg(), $request, $body);
        }

        if ($response->getResultCode() !== Response::SUCCESS) {
            $this->logger->error('wechat result code error');
            $this->logger->error(json_encode($params));
            $this->logger->error($body);
        }

        $response->setRaw($body);
        return $response;
    }

    /**
     * @param string[] $params
     *
     * @return string
     */
    protected function envelop(array $params): string
    {
        $params['sign'] = $this->sign($params);
        return $this->serializer->serialize($params, 'xml');
    }

    /**
     * @param string[] $params
     *
     * @return string
     */
    protected function sign(array $params): string
    {
        $params = array_filter($params, function ($v) {
            return $v !== null && $v !== '';
        });
        $params = array_map(
            function ($k, $v) {
                return "{$k}={$v}";
            },
            array_keys($params),
            $params
        );
        sort($params);
        $params[] = "key={$this->secret}";

        return strtoupper(md5(implode('&', $params)));
    }

    /**
     * @param string[] $params
     *
     * @return bool
     */
    protected function check(array $params): bool
    {
        $signature = $this->sign(array_filter(
            $params,
            function ($k) {
                return 'sign' !== $k;
            },
            ARRAY_FILTER_USE_KEY
        ));

        return $signature === $params['sign'];
    }

}
