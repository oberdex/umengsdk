<?php

namespace com\umeng\uapm\param;
use com\alibaba\openapi\client\entity\ByteArray;
class UmengQuickbirdSymUploadParam
{

    /**
     * @return string 数据源id（appKey)
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
     * @return string App版本号
     */
    public function getAppVersion()
    {
        $tempResult = $this->sdkStdResult["appVersion"];
        return $tempResult;
    }

    /**
     * 设置App版本号
     * @param String $appVersion
     * 参数示例：<pre>1.0.3</pre>
     * 此参数必填     */
    public function setAppVersion($appVersion)
    {
        $this->sdkStdResult["appVersion"] = $appVersion;
    }


    /**
     * @return 文件类型(1 mapping文件；2 so文件；3 dSYM文件压缩包)
     */
    public function getFileType()
    {
        $tempResult = $this->sdkStdResult["fileType"];
        return $tempResult;
    }

    /**
     * 设置文件类型(1 mapping文件；2 so文件；3 dSYM文件压缩包)
     * @param Integer $fileType
     * 参数示例：<pre>1</pre>
     * 此参数必填     */
    public function setFileType($fileType)
    {
        $this->sdkStdResult["fileType"] = $fileType;
    }


    /**
     * @return string 文件名称，后缀只允许为txt,so,sym,zip,gz
     */
    public function getFileName()
    {
        $tempResult = $this->sdkStdResult["fileName"];
        return $tempResult;
    }

    /**
     * 设置文件名称，后缀只允许为txt,so,sym,zip,gz
     * @param String $fileName
     * 参数示例：<pre>symbol.zip</pre>
     * 此参数必填     */
    public function setFileName($fileName)
    {
        $this->sdkStdResult["fileName"] = $fileName;
    }


    private $sdkStdResult = array();

    public function getSdkStdResult()
    {
        return $this->sdkStdResult;
    }

}