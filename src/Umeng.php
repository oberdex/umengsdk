<?php


namespace oberdex\umengsdk;


use com\alibaba\openapi\client\APIId;
use com\alibaba\openapi\client\APIRequest;
use com\alibaba\openapi\client\exception\OceanException;
use com\umeng\uapm\param\UmengQuickbirdServerGetStatTrendParam;
use com\umeng\uapm\param\UmengQuickbirdServerGetStatTrendResult;
use com\umeng\uapp\param\UmengUappGetActiveUsersParam;
use com\umeng\uapp\param\UmengUappGetActiveUsersResult;
use com\umeng\uapp\param\UmengUappGetAppListParam;
use com\umeng\uapp\param\UmengUappGetAppListResult;
use com\umeng\uapp\param\UmengUappGetChannelDataParam;
use com\umeng\uapp\param\UmengUappGetChannelDataResult;
use com\umeng\uapp\param\UmengUappGetDurationsParam;
use com\umeng\uapp\param\UmengUappGetDurationsResult;
use com\umeng\uapp\param\UmengUappGetRetentionsParam;
use com\umeng\uapp\param\UmengUappGetRetentionsResult;
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
            return $result->getAverage();
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
            if ($channels) {
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
            }
            $data['page'] = $result->getPage();
            $data['totalPage'] = $result->getTotalPage();
            unset($result);
            return $data;
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 获取App活跃用户数
     * @param $appKey 应用id
     * @param string $periodType 查询类型（按日daily,按周weekly,按月monthly 查询）
     * @param null $startDate 查询起始日期,默认当前日期
     * @param null $endDate 查询截止日期,默认当前日期
     * @return array
     * @throws SDKException
     */
    public function getActiveUsers($appKey, $periodType = 'daily', $startDate = null, $endDate = null)
    {
        try {
            if (is_null($startDate)) {
                $startDate = date('Y-m-d');
            }
            if (is_null($endDate)) {
                $endDate = date('Y-m-d');
            }
            $param = new UmengUappGetActiveUsersParam();
            $param->setAppkey($appKey);
            $param->setStartDate($startDate);
            $param->setEndDate($endDate);
            $param->setPeriodType($periodType);
            $request = new APIRequest ();
            $apiId = new APIId (self::NAME_SPACE, 'umeng.uapp.getActiveUsers', self::API_VERSION);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetActiveUsersResult();
            $this->syncAPIClient->send($request, $result, $this->reqPolicy);
            $activeUserInfos = $result->getActiveUserInfo();
            $data = [];
            foreach ($activeUserInfos as $activeUserInfo) {
                $data[] = [
                    'date' => $activeUserInfo->getDate(),
                    'dailyValue' => $activeUserInfo->getDailyValue(),
                    'hourValue' => $activeUserInfo->getHourValue(),
                    'value' => $activeUserInfo->getValue(),
                ];
            }
            return $data;
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 获取App新增用户留存率
     * @param $appKey 应用id
     * @param string $periodType 查询类型（按日daily,按周weekly,按月monthly 查询）
     * @param null $channelName 渠道名称（仅限一个App%20Store）
     * @param null $type newUser(默认):新增用户留存率；activeUser:活跃用户留存率
     * @param null $startDate 查询起始日期（2019-01-01）,默认当前日期
     * @param null $endDate 查询截止日期（2019-01-01）,默认当前日期
     * @return array date:统计日期,totalInstallUser:当日安装用户数,
     * retentionRate:相对之后几日的留存用户数，安装日期到今日之间7天（每天），14天后，30天后留存用户占比（不包含今日）
     * @throws SDKException
     */
    public function getRetentions($appKey, $periodType = 'daily', $channelName = null, $type = null, $startDate = null, $endDate = null)
    {
        try {
            if (is_null($startDate)) {
                $startDate = date('Y-m-d');
            }
            if (is_null($endDate)) {
                $endDate = date('Y-m-d');
            }
            $param = new UmengUappGetRetentionsParam();
            $param->setAppkey($appKey);
            $param->setStartDate($startDate);
            $param->setEndDate($endDate);
            $param->setPeriodType($periodType);
            if (!is_null($channelName)) {
                $param->setChannel($channelName);
            }
            if (!is_null($type) && in_array($type, ['newUser', 'activeUser'])) {
                $param->setType($type);
            }
            $request = new APIRequest ();
            $apiId = new APIId (self::NAME_SPACE, 'umeng.uapp.getRetentions', self::API_VERSION);
            $request->apiId = $apiId;
            $request->requestEntity = $param;
            $result = new UmengUappGetRetentionsResult();
            $this->syncAPIClient->send($request, $result, $this->reqPolicy);
            $retentionInfos = $result->getRetentionInfo();
            $data = [];
            foreach ($retentionInfos as $retentionInfo) {
                $data[] = [
                    'date' => $retentionInfo->getDate(),
                    'totalInstallUser' => $retentionInfo->getTotalInstallUser(),
                    'retentionRate' => $retentionInfo->getRetentionRate()
                ];
            }
            return $data;
        } catch (OceanException $e) {
            throw new SDKException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * 获取apm异常统计
     * @param string $appKey 数据源id（appKey)
     * @param string $startDate 起始日期（yyyy-MM-dd格式） 2021-06-01
     * @param string $endDate 结束日期（yyyy-MM-dd格式） 2021-06-01
     * @param int $type 异常类型（1. java/ios崩溃 2. native崩溃 3.ANR 4.自定义异常 5.卡顿）
     * @return mixed
     */
    public function getApmResult($appKey, $startDate = null, $endDate = null, $type = 1)
    {
        if (is_null($startDate)) {
            $startDate = date('Y-m-d');
        }
        if (is_null($endDate)) {
            $endDate = date('Y-m-d');
        }
        $param = new UmengQuickbirdServerGetStatTrendParam();
        $param->setDataSourceId($appKey);
        $param->setType($type);
        $param->setStartDate($startDate);
        $param->setEndDate($endDate);
        $request = new APIRequest ();
        $apiId = new APIId (self::NAME_APM_SPACE, "umeng.quickbird.server.getStatTrend", self::API_VERSION);
        $request->apiId = $apiId;
        $request->requestEntity = $param;

        $result = new UmengQuickbirdServerGetStatTrendResult();
        $this->syncAPIClient->send($request, $result, $this->reqPolicy);
        return $result->getData();
    }
}