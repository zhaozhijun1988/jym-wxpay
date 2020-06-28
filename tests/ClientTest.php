<?php namespace Jmy\Wxpay;

use GuzzleHttp\Psr7\Response;
use Jmy\Wxpay\Exception\TransferException;
use Jmy\Wxpay\Model\TransferCompleteResponse;
use Jmy\Wxpay\Model\TransferInCompleteResponse;
use Jmy\Wxpay\Model\TransferQueryResponse;
use Jmy\Wxpay\Request\TransferInfoQuery;
use Jmy\Wxpay\Request\TransferRequest;
use Psr\Log\LoggerInterface;

class ClientTest extends \Codeception\Test\Unit
{
    /**
     * @var \Jmy\Wxpay\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testTransferOk()
    {

        $response = <<<_XML
        <xml>
        
        <return_code><![CDATA[SUCCESS]]></return_code>
        
        <return_msg><![CDATA[]]></return_msg>
        
        <mch_appid><![CDATA[wxec38b8ff840bd989]]></mch_appid>
        
        <mchid><![CDATA[10013274]]></mchid>
        
        <device_info><![CDATA[]]></device_info>
        
        <nonce_str><![CDATA[lxuDzMnRjpcXzxLx0q]]></nonce_str>
        
        <result_code><![CDATA[SUCCESS]]></result_code>
        
        <partner_trade_no><![CDATA[10013574201505191526582441]]></partner_trade_no>
        
        <payment_no><![CDATA[1000018301201505190181489473]]></payment_no>
        
        <payment_time><![CDATA[2015-05-19 10:00:00]]></payment_time>
        
        </xml>
_XML;

        $guzzle = \Codeception\Stub::make(\GuzzleHttp\Client::class, ['request' => new Response(200, [], $response)]);
        $logger = \Codeception\Stub::makeEmpty(LoggerInterface::class);

        $client = new Client(
            'wxe062425f740c30d8',
            '10000098',
            '',
            '',
            '',
            new OpensslNonce(),
            $guzzle,
            $logger
        );
        $request = new TransferRequest();
        $request->setOpenid('节日快乐!')
            ->setAmount(100)
            ->setDesc('佣金奖励')
            ->setPartnerTradeNo('100000982014120919616');
        ;
        $response =  $client->transfer($request);
        $this->assertEquals(TransferCompleteResponse::class, get_class($response));

    }


    public function testTransferInCompleteOk()
    {

        $response = <<<_XML
 <xml> <return_code><![CDATA[SUCCESS]]></return_code> <return_msg><![CDATA[支付失败]]></return_msg> <mch_appid><![CDATA[wx2398bbs6141baeaa5e6]]></mch_appid> <mchid><![CDATA[1581797391]]></mchid> <result_code><![CDATA[FAIL]]></result_code> <err_code><![CDATA[AMOUNT_LIMIT]]></err_code> <err_code_des><![CDATA[付款金额超出限制。低于最小金额1.00元或累计超过5000.00元。]]></err_code_des> </xml>
_XML;

        $guzzle = \Codeception\Stub::make(\GuzzleHttp\Client::class, ['request' => new Response(200, [], $response)]);
        $logger = \Codeception\Stub::makeEmpty(LoggerInterface::class);

        $client = new Client(
            'wxe062425f740c30d8',
            '10000098',
            '',
            '',
            '',
            new OpensslNonce(),
            $guzzle,
            $logger
        );
        $request = new TransferRequest();
        $request->setOpenid('节日快乐!')
            ->setAmount(100)
            ->setDesc('佣金奖励')
            ->setPartnerTradeNo('100000982014120919616');
        ;
        $this->expectException(TransferException::class);
        $client->transfer($request);

    }


    public function testTransferException()
    {
        $response = <<<_XML
<xml>

<return_code><![CDATA[FAIL]]></return_code>

<return_msg><![CDATA[系统繁忙,请稍后再试.]]></return_msg>

<result_code><![CDATA[FAIL]]></result_code>

<err_code><![CDATA[SYSTEMERROR]]></err_code>

<err_code_des><![CDATA[系统繁忙,请稍后再试.]]></err_code_des>

</xml>

_XML;

        $guzzle = \Codeception\Stub::make(\GuzzleHttp\Client::class, ['request' => new Response(200, [], $response)]);
        $logger = \Codeception\Stub::makeEmpty(LoggerInterface::class);

        $client = new Client(
            'wxe062425f740c30d8',
            '10000098',
            '',
            '',
            '',
            new OpensslNonce(),
            $guzzle,
            $logger
        );
        $request = new TransferRequest();
        $request->setOpenid('节日快乐!')
            ->setAmount(100)
            ->setDesc('佣金奖励')
            ->setPartnerTradeNo('100000982014120919616');
        ;
        $this->expectException(TransferException::class);
        $client->transfer($request);
    }

    public function testFindTransferOk()
    {
        $response = <<<_XML
<xml> <return_code><![CDATA[SUCCESS]]></return_code> <result_code><![CDATA[SUCCESS]]></result_code> <partner_trade_no><![CDATA[MWcGD8ocvZHbsxvfVUWzXG]]></partner_trade_no> <mch_id><![CDATA[1581797391]]></mch_id> <detail_id><![CDATA[10101160793292006263185689845910]]></detail_id> <status><![CDATA[SUCCESS]]></status> <reason><![CDATA[]]></reason> <openid><![CDATA[oLsoD0RzKvWptjBwdHUNg1_8WqN0]]></openid> <transfer_name><![CDATA[]]></transfer_name> <payment_amount><![CDATA[100]]></payment_amount> <transfer_time><![CDATA[2020-06-26 00:26:40]]></transfer_time> <payment_time><![CDATA[2020-06-26 00:26:41]]></payment_time> <desc><![CDATA[佣金奖励]]></desc> <appid><![CDATA[wx2398bb614aeaa5e6]]></appid> </xml>

_XML;

        $guzzle = \Codeception\Stub::make(\GuzzleHttp\Client::class, ['request' => new Response(200, [], $response)]);
        $logger = \Codeception\Stub::makeEmpty(LoggerInterface::class);

        $client = new Client(
            'wxe062425f740c30d8',
            '10000098',
            '',
            '',
            '',
            new OpensslNonce(),
            $guzzle,
            $logger
        );
        $response = $client->findTransfer((new TransferInfoQuery())->setPartnerTradeNo('MWcGD8ocvZHbsxvfVUWzXG'));
        $this->assertEquals(TransferQueryResponse::class, get_class($response));
    }
}
