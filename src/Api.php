<?php


namespace oberdex\umengsdk;

use com\alibaba\openapi\client\policy\ClientPolicy;
use com\alibaba\openapi\client\policy\DataProtocol;
use com\alibaba\openapi\client\policy\RequestPolicy;
use com\alibaba\openapi\client\SyncAPIClient;
use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{

    /**
     * 页号，从1开始
     * @var
     */
    protected $page;
    /**
     * 每页显示数量,每页显示数量（最大100）
     * @var int
     */
    protected $perPage;
    protected $reqPolicy;
    protected $apiKey;
    protected $apiSecurity;
    protected $syncAPIClient;
    protected $clientPolicy;

    const NAME_SPACE = 'com.umeng.uapp';
    const API_VERSION = 1;
    const SERVICE_HOST = 'gateway.open.umeng.com';

    /**
     * Api constructor.
     * @param $apiKey
     * @param $apiSecurity
     */
    public function __construct($apiKey, $apiSecurity)
    {
        $this->apiKey = $apiKey;
        $this->apiSecurity = $apiSecurity;
        if (empty($this->clientPolicy)) {
            $this->clientPolicy = new ClientPolicy ($this->apiKey, $this->apiSecurity, self::SERVICE_HOST);
        }
        if (empty($this->syncAPIClient)) {
            $this->syncAPIClient = new SyncAPIClient($this->clientPolicy);
        }
        if (empty($this->reqPolicy)) {
            $this->reqPolicy = new RequestPolicy ();
        }
        $this->reqPolicy->responseProtocol = DataProtocol::param2;
        $this->reqPolicy->requestProtocol = DataProtocol::param2;
        $this->reqPolicy->httpMethod = "POST";
        $this->reqPolicy->needAuthorization = false;
        $this->reqPolicy->requestSendTimestamp = false;
        // 测试环境只支持http
        // $reqPolicy->useHttps = false;
        $this->reqPolicy->useHttps = true;
        $this->reqPolicy->useSignture = true;
        $this->reqPolicy->accessPrivateApi = false;
    }
}