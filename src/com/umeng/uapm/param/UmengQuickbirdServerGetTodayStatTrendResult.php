<?php

namespace com\umeng\uapm\param;

use ArrayObject;

class UmengQuickbirdServerGetTodayStatTrendResult
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
     * @param UmengQuickbirdOpenTodayTrendResult $data
     */
    public function setData(UmengQuickbirdOpenTodayTrendResult $data)
    {
        $this->data = $data;
    }


    private $stdResult;

    /**
     * @param $stdResult
     */
    public function setStdResult($stdResult)
    {
        $this->stdResult = $stdResult;
        if (array_key_exists("data", $this->stdResult)) {
            $dataResult = $this->stdResult->{"data"};
            $object = json_decode(json_encode($dataResult), true);
            $this->data = array();
            for ($i = 0; $i < count($object); $i++) {
                $arrayobject = new ArrayObject ($object [$i]);
                $UmengQuickbirdOpenTodayTrendResultResult = new UmengQuickbirdOpenTodayTrendResult();
                $UmengQuickbirdOpenTodayTrendResultResult->setArrayResult($arrayobject);
                $this->data [$i] = $UmengQuickbirdOpenTodayTrendResultResult;
            }
        }
    }

    private $arrayResult;

    public function setArrayResult($arrayResult)
    {
        $this->arrayResult = $arrayResult;
        if (array_key_exists("data", $this->arrayResult)) {
            $dataResult = $arrayResult['data'];
            $this->data = new UmengQuickbirdOpenTodayTrendResult();
            $this->data->setStdResult($dataResult);
        }
    }

}