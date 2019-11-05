<?php


namespace oberdex\umengsdk;


use Hanson\Foundation\Foundation;

/**
 * Class Dispatch
 * @package oberdex\youmengsdk
 * @Method getAppList 获取所有app
 * @Method getTodayData 获取今天统计数据
 */
class Dispatch extends Foundation
{
    private $umengsdk;

    /**
     * Dispatch constructor.
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
        $this->umengsdk = new Umeng($config['apiKey'], $config['apiSecurity']);
    }

    public function __call($name, $arguments)
    {
        return $this->umengsdk->{$name}(...$arguments);
    }
}