<?php

namespace com\umeng\uapm\param;
use com\alibaba\openapi\client\entity\ByteArray;

class UmengQuickbirdServerGetStatTrendResult
{
    private $data;

    /**
     * @return
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 设置
     * @param array include @see UmengQuickbirdOpenTrendResult[] $data
     * 此参数必填     */
    public function setData(UmengQuickbirdOpenTrendResult $data)
    {
        $this->data = $data;
    }


    private $stdResult;

    public function setStdResult($stdResult)
    {
        $this->stdResult = $stdResult;
        if (array_key_exists("data", $this->stdResult)) {
            $dataResult = $this->stdResult->{"data"};
            $object = json_decode(json_encode($dataResult), true);
            $this->data = array();
            for ($i = 0; $i < count($object); $i++) {
                $arrayobject = new ArrayObject ($object [$i]);
                $UmengQuickbirdOpenTrendResultResult = new UmengQuickbirdOpenTrendResult();
                $UmengQuickbirdOpenTrendResultResult->setArrayResult($arrayobject);
                $this->data [$i] = $UmengQuickbirdOpenTrendResultResult;
            }
        }
    }

    private $arrayResult;

    public function setArrayResult($arrayResult)
    {
        $this->arrayResult = $arrayResult;
        if (array_key_exists("data", $this->arrayResult)) {
            $dataResult = $arrayResult['data'];
            $this->data = new UmengQuickbirdOpenTrendResult();
            $this->data->setStdResult($dataResult);
        }
    }

}