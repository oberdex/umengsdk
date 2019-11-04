<?php


namespace oberdex\youmengsdk;


use com\alibaba\openapi\client\APIId;
use com\alibaba\openapi\client\APIRequest;
use com\alibaba\openapi\client\exception\OceanException;
use com\alibaba\openapi\client\policy\ClientPolicy;
use com\alibaba\openapi\client\SyncAPIClient;
use com\alibaba\umeng\uapp\param\UmengUappGetAppListParam;
use com\alibaba\umeng\uapp\param\UmengUappGetAppListResult;

class Umeng extends Api
{
    /**
     * 获取所有app数量
     */
    public function getAppList()
    {
        try {
            $clientPolicy = new ClientPolicy ($this->apiKey, $this->apiSecurity, 'gateway.open.umeng.com');
            $syncAPIClient = new SyncAPIClient($clientPolicy);
            $param = new UmengUappGetAppListParam();
            $param->setPage($this->page);
            $param->setPerPage($this->perPage);
            $param->setAccessToken("");
            $request = new APIRequest ();
            $apiId = new APIId ('com.umeng.uapp', 'umeng.uapp.getAppList', $this->api_version);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetAppListResult();
            $syncAPIClient->send($request, $result, $this->reqPolicy);
            var_dump($result);
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }
}