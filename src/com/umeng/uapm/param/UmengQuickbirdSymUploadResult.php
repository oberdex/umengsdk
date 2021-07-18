<?php

namespace com\umeng\uapm\param;

class UmengQuickbirdSymUploadResult
{


    private $uploadAddress;

    /**
     * @return string 文件上传地址
     */
    public function getUploadAddress()
    {
        return $this->uploadAddress;
    }

    /**
     * 设置文件上传地址
     * @param String $uploadAddress
     * 此参数必填     */
    public function setUploadAddress($uploadAddress)
    {
        $this->uploadAddress = $uploadAddress;
    }


    private $accessKeyId;

    /**
     * @return string 文件上传表单必要参数
     */
    public function getAccessKeyId()
    {
        return $this->accessKeyId;
    }

    /**
     * 设置文件上传表单必要参数
     * @param String $accessKeyId
     * 此参数必填     */
    public function setAccessKeyId($accessKeyId)
    {
        $this->accessKeyId = $accessKeyId;
    }


    private $key;

    /**
     * @return string 文件上传表单必要参数
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * 设置文件上传表单必要参数
     * @param String $key
     * 此参数必填     */
    public function setKey($key)
    {
        $this->key = $key;
    }


    private $policy;

    /**
     * @return string 文件上传表单必要参数
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * 设置文件上传表单必要参数
     * @param String $policy
     * 此参数必填     */
    public function setPolicy($policy)
    {
        $this->policy = $policy;
    }


    private $signature;

    /**
     * @return string 文件上传表单必要参数
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * 设置文件上传表单必要参数
     * @param String $signature
     * 此参数必填     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }


    private $callback;

    /**
     * @return string 文件上传表单必要参数
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * 设置文件上传表单必要参数
     * @param String $callback
     * 此参数必填     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }


    private $traceId;

    /**
     * @return string 请求唯一id，调试用
     */
    public function getTraceId()
    {
        return $this->traceId;
    }

    /**
     * 设置请求唯一id，调试用
     * @param String $traceId
     * 此参数必填     */
    public function setTraceId($traceId)
    {
        $this->traceId = $traceId;
    }


    private $stdResult;

    public function setStdResult($stdResult)
    {
        $this->stdResult = $stdResult;
        if (array_key_exists("uploadAddress", $this->stdResult)) {
            $this->uploadAddress = $this->stdResult->{"uploadAddress"};
        }
        if (array_key_exists("accessKeyId", $this->stdResult)) {
            $this->accessKeyId = $this->stdResult->{"accessKeyId"};
        }
        if (array_key_exists("key", $this->stdResult)) {
            $this->key = $this->stdResult->{"key"};
        }
        if (array_key_exists("policy", $this->stdResult)) {
            $this->policy = $this->stdResult->{"policy"};
        }
        if (array_key_exists("signature", $this->stdResult)) {
            $this->signature = $this->stdResult->{"signature"};
        }
        if (array_key_exists("callback", $this->stdResult)) {
            $this->callback = $this->stdResult->{"callback"};
        }
        if (array_key_exists("traceId", $this->stdResult)) {
            $this->traceId = $this->stdResult->{"traceId"};
        }
    }

    private $arrayResult;

    public function setArrayResult($arrayResult)
    {
        $this->arrayResult = $arrayResult;
        if (array_key_exists("uploadAddress", $this->arrayResult)) {
            $this->uploadAddress = $arrayResult['uploadAddress'];
        }
        if (array_key_exists("accessKeyId", $this->arrayResult)) {
            $this->accessKeyId = $arrayResult['accessKeyId'];
        }
        if (array_key_exists("key", $this->arrayResult)) {
            $this->key = $arrayResult['key'];
        }
        if (array_key_exists("policy", $this->arrayResult)) {
            $this->policy = $arrayResult['policy'];
        }
        if (array_key_exists("signature", $this->arrayResult)) {
            $this->signature = $arrayResult['signature'];
        }
        if (array_key_exists("callback", $this->arrayResult)) {
            $this->callback = $arrayResult['callback'];
        }
        if (array_key_exists("traceId", $this->arrayResult)) {
            $this->traceId = $arrayResult['traceId'];
        }
    }
}