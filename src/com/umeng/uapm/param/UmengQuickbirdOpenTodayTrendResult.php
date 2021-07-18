<?php

namespace com\umeng\uapm\param;

use com\alibaba\openapi\client\entity\SDKDomain;

class UmengQuickbirdOpenTodayTrendResult extends SDKDomain
{

    private $timePoint;

    /**
     * @return mixed 今日小时整点
     */
    public function getTimePoint()
    {
        return $this->timePoint;
    }

    /**
     * 设置今日小时整点
     * @param String $timePoint
     * 参数示例：<pre>13:00</pre>
     * 此参数必填     */
    public function setTimePoint($timePoint)
    {
        $this->timePoint = $timePoint;
    }


    private $errorCount;

    /**
     * @return mixed 异常次数
     */
    public function getErrorCount()
    {
        return $this->errorCount;
    }

    /**
     * 设置异常次数
     * @param Long $errorCount
     * 参数示例：<pre>120</pre>
     * 此参数必填     */
    public function setErrorCount($errorCount)
    {
        $this->errorCount = $errorCount;
    }


    private $errorRate;

    /**
     * @return mixed 异常比例(百分数)
     */
    public function getErrorRate()
    {
        return $this->errorRate;
    }

    /**
     * 设置异常比例(百分数)
     * @param Double $errorRate
     * 参数示例：<pre>17.24</pre>
     * 此参数必填     */
    public function setErrorRate($errorRate)
    {
        $this->errorRate = $errorRate;
    }


    private $affectedUserCount;

    /**
     * @return mixed 影响用户数
     */
    public function getAffectedUserCount()
    {
        return $this->affectedUserCount;
    }

    /**
     * 设置影响用户数
     * @param Long $affectedUserCount
     * 参数示例：<pre>56</pre>
     * 此参数必填     */
    public function setAffectedUserCount($affectedUserCount)
    {
        $this->affectedUserCount = $affectedUserCount;
    }


    private $affectedUserRate;

    /**
     * @return mixed 影响用户比例(百分数)
     */
    public function getAffectedUserRate()
    {
        return $this->affectedUserRate;
    }

    /**
     * 设置影响用户比例(百分数)
     * @param Double $affectedUserRate
     * 参数示例：<pre>10.21</pre>
     * 此参数必填     */
    public function setAffectedUserRate($affectedUserRate)
    {
        $this->affectedUserRate = $affectedUserRate;
    }


    private $stdResult;

    public function setStdResult($stdResult)
    {
        $this->stdResult = $stdResult;
        if (array_key_exists("timePoint", $this->stdResult)) {
            $this->timePoint = $this->stdResult->{"timePoint"};
        }
        if (array_key_exists("errorCount", $this->stdResult)) {
            $this->errorCount = $this->stdResult->{"errorCount"};
        }
        if (array_key_exists("errorRate", $this->stdResult)) {
            $this->errorRate = $this->stdResult->{"errorRate"};
        }
        if (array_key_exists("affectedUserCount", $this->stdResult)) {
            $this->affectedUserCount = $this->stdResult->{"affectedUserCount"};
        }
        if (array_key_exists("affectedUserRate", $this->stdResult)) {
            $this->affectedUserRate = $this->stdResult->{"affectedUserRate"};
        }
    }

    private $arrayResult;

    public function setArrayResult($arrayResult)
    {
        $this->arrayResult = $arrayResult;
        if (array_key_exists("timePoint", $this->arrayResult)) {
            $this->timePoint = $arrayResult['timePoint'];
        }
        if (array_key_exists("errorCount", $this->arrayResult)) {
            $this->errorCount = $arrayResult['errorCount'];
        }
        if (array_key_exists("errorRate", $this->arrayResult)) {
            $this->errorRate = $arrayResult['errorRate'];
        }
        if (array_key_exists("affectedUserCount", $this->arrayResult)) {
            $this->affectedUserCount = $arrayResult['affectedUserCount'];
        }
        if (array_key_exists("affectedUserRate", $this->arrayResult)) {
            $this->affectedUserRate = $arrayResult['affectedUserRate'];
        }
    }

}