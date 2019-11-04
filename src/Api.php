<?php


namespace oberdex\umengsdk;

use com\alibaba\openapi\client\policy\RequestPolicy;
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
    /**
     * api版本
     * @var int
     */
    protected $api_version = 1;

    /**
     * Api constructor.
     * @param $apiKey
     * @param $apiSecurity
     */
    public function __construct($apiKey, $apiSecurity, $page = 1, $perPage = 100)
    {
        $this->apiKey = $apiKey;
        $this->apiSecurity = $apiSecurity;
        $this->page = $page;
        $this->perPage = $perPage;
        $this->reqPolicy = new RequestPolicy ();
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