<?php


namespace oberdex\umengsdk;


use Hanson\Foundation\Foundation;

/**
 * Class UmengSDK
 * @package oberdex\youmengsdk
 * @Method getAppList 获取所有app
 * @Method getTodayData 获取今天统计数据
 * @Method getDurations 平均单次使用时长
 * @Method getChannelData 获取渠道维度信息
 * @Method getRetentions 获取App新增用户留存率
 * @Method getActiveUsers 获取App活跃用户数
 */
class UmengSDK extends Foundation
{
    private $umengsdk;

    /**
     * Dispatch constructor.
     * @param $config
     */
    public function __construct($config)
    {
        if (!isset($config['debug'])) {
            $config['debug'] = false;
        }
        parent::__construct($config);
        $this->umengsdk = new Umeng($config['apiKey'], $config['apiSecurity']);
    }

    public function __call($name, $arguments)
    {
        return $this->umengsdk->{$name}(...$arguments);
    }
}