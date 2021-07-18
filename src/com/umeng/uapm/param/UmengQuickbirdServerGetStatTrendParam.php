<?php

namespace com\umeng\uapm\param;

class UmengQuickbirdServerGetStatTrendParam
{
    /**
     * @return  string 数据源id（appKey)
     */
    public function getDataSourceId()
    {
        $tempResult = $this->sdkStdResult["dataSourceId"];
        return $tempResult;
    }

    /**
     * 设置数据源id（appKey)
     * @param String $dataSourceId
     * 参数示例：<pre>5fb6001a73749c24fd9cb356</pre>
     * 此参数必填     */
    public function setDataSourceId($dataSourceId)
    {
        $this->sdkStdResult["dataSourceId"] = $dataSourceId;
    }


    /**
     * @return Integer 异常类型（1. java/ios崩溃 2. native崩溃  3.ANR  4.自定义异常 5.卡顿）
     */
    public function getType()
    {
        $tempResult = $this->sdkStdResult["type"];
        return $tempResult;
    }

    /**
     * 设置异常类型（1. java/ios崩溃 2. native崩溃  3.ANR  4.自定义异常 5.卡顿）
     * @param Integer $type
     * 参数示例：<pre>1</pre>
     * 此参数必填     */
    public function setType($type)
    {
        $this->sdkStdResult["type"] = $type;
    }


    /**
     * @return string 指定App版本
     */
    public function getAppVersion()
    {
        $tempResult = $this->sdkStdResult["appVersion"];
        return $tempResult;
    }

    /**
     * 设置指定App版本
     * @param String $appVersion
     * 参数示例：<pre>1.0</pre>
     * 此参数为可选参数
     * 默认值：<pre></pre>
     */
    public function setAppVersion($appVersion)
    {
        $this->sdkStdResult["appVersion"] = $appVersion;
    }


    /**
     * @return string 起始日期（yyyy-MM-dd格式）
     */
    public function getStartDate()
    {
        $tempResult = $this->sdkStdResult["startDate"];
        return $tempResult;
    }

    /**
     * 设置起始日期（yyyy-MM-dd格式）
     * @param String $startDate
     * 参数示例：<pre>2021-06-01</pre>
     * 此参数必填     */
    public function setStartDate($startDate)
    {
        $this->sdkStdResult["startDate"] = $startDate;
    }


    /**
     * @return string 结束日期（yyyy-MM-dd格式，和起始日期不能超过90天）
     */
    public function getEndDate()
    {
        $tempResult = $this->sdkStdResult["endDate"];
        return $tempResult;
    }

    /**
     * 设置结束日期（yyyy-MM-dd格式，和起始日期不能超过90天）
     * @param String $endDate
     * 参数示例：<pre>2021-06-03</pre>
     * 此参数必填     */
    public function setEndDate($endDate)
    {
        $this->sdkStdResult["endDate"] = $endDate;
    }


    private $sdkStdResult = array();

    public function getSdkStdResult()
    {
        return $this->sdkStdResult;
    }

}