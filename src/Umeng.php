<?php


namespace oberdex\umengsdk;


use com\alibaba\openapi\client\APIId;
use com\alibaba\openapi\client\APIRequest;
use com\alibaba\openapi\client\exception\OceanException;
use com\umeng\uapp\param\UmengUappGetAppListParam;
use com\umeng\uapp\param\UmengUappGetAppListResult;
use com\umeng\uapp\param\UmengUappGetChannelDataParam;
use com\umeng\uapp\param\UmengUappGetChannelDataResult;
use com\umeng\uapp\param\UmengUappGetDurationsParam;
use com\umeng\uapp\param\UmengUappGetDurationsResult;
use com\umeng\uapp\param\UmengUappGetTodayDataParam;
use com\umeng\uapp\param\UmengUappGetTodayDataResult;

class Umeng extends Api
{
    /**
     * 获取所有app数量
     * @param int $page
     * @param int $perPage
     * @return array
     * @throws SDKException
     */
    public function getAppList($page = 1, $perPage = 10)
    {
        try {
            $param = new UmengUappGetAppListParam();
            $param->setPage($page);
            $param->setPerPage($perPage);
            $param->setAccessToken("");
            $request = new APIRequest ();
            $apiId = new APIId(self::NAME_SPACE, 'umeng.uapp.getAppList', self::API_VERSION);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetAppListResult();
            $this->syncAPIClient->send($request, $result, $this->reqPolicy);
            $apps = $result->getAppInfos();
            $results = [];
            if ($apps) {
                foreach ($apps as $app) {
                    $results[] = [
                        'updatedAt' => $app->getUpdatedAt(),
                        'createdAt' => $app->getCreatedAt(),
                        'useGameSdk' => $app->getUseGameSdk(),
                        'name' => $app->getName(),
                        'platform' => $app->getPlatform(),
                        'popular' => $app->getPopular(),
                        'category' => $app->getCategory(),
                        'appkey' => $app->getAppkey()
                    ];
                }
            }
            $results['totalPage'] = $result->getTotalPage();
            $results['page'] = $result->getPage();
            unset($result);
            return $results;
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 获取单个应用今天数据
     * @param $appKey
     * @return array
     * @throws SDKException
     */
    public function getTodayData($appKey)
    {
        try {
            $param = new UmengUappGetTodayDataParam();
            $param->setAppkey($appKey);
            $request = new APIRequest ();
            $apiId = new APIId (self::NAME_SPACE, 'umeng.uapp.getTodayData', self::API_VERSION);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetTodayDataResult();
            $this->syncAPIClient->send($request, $result, $this->reqPolicy);
            $todaydata = $result->getTodayData();
            return [
                'date' => $todaydata->getDate(),
                'newUsers' => $todaydata->getNewUsers(),
                'totalUsers' => $todaydata->getTotalUsers(),
                'activityUsers' => $todaydata->getActivityUsers(),
                'launches' => $todaydata->getLaunches(),
            ];
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 平均单次使用时长
     * @param $appkey
     * @param string $channelName
     * @param string $date
     * @return float|int
     * @throws SDKException
     */
    public function getDurations($appkey, $channelName = null, $date = null)
    {
        try {
            if (is_null($date)) {
                $date = date('Y-m-d');
            }
            $param = new UmengUappGetDurationsParam();
            $param->setAppkey($appkey);
            $param->setDate($date);
            $param->setStatType('daily_per_launch');
            if (is_null($channelName)) {
                $param->setChannel($channelName);
            }
            $request = new APIRequest ();
            $apiId = new APIId (self::NAME_SPACE, 'umeng.uapp.getDurations', self::API_VERSION);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetDurationsResult();
            $this->syncAPIClient->send($request, $result, $this->reqPolicy);
            $avg = $result->getAverage();
            return $avg ? $avg / 60 : 0;
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 获取渠道维度信息
     * @param $appKey
     * @param null $date
     * @param int $page
     * @param int $perPage
     * @return array
     * @throws SDKException
     */
    public function getChannelData($appKey, $date = null, $page = 1, $perPage = 10)
    {
        try {
            $param = new UmengUappGetChannelDataParam();
            $param->setAppkey($appKey);
            if (is_null($date)) {
                $date = date('Y-m-d');
            }
            $param->setDate($date);
            $param->setPerPage($perPage);
            $param->setPage($page);
            $request = new APIRequest ();
            $apiId = new APIId (self::NAME_SPACE, 'umeng.uapp.getChannelData', self::API_VERSION);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetChannelDataResult();
            $this->syncAPIClient->send($request, $result, $this->reqPolicy);
            $channels = $result->getChannelInfos();
            $data = [];
            foreach ($channels as $channel) {
                $data[] = [
                    'duration' => $channel->getDuration(),
                    'date' => $channel->getDate(),
                    'totalUserRate' => $channel->getTotalUserRate(),
                    'id' => $channel->getId(),
                    'launch' => $channel->getLaunch(),
                    'channel' => $channel->getChannel(),
                    'totalUser' => $channel->getTotalUser(),
                    'activeUser' => $channel->getActiveUser(),
                    'newUser' => $channel->getNewUser(),
                ];
            }
            unset($result);
            return $data;
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }
}