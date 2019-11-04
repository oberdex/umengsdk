<?php


namespace oberdex\umengsdk;


use Hanson\Foundation\Foundation;

/**
 * Class SDK
 * @package oberdex\youmengsdk
 * @Method getAppList 获取所有app
 */
class Dispatch extends Foundation
{
    private $umeng;

    /**
     * SDK constructor.
     * @param $sdk
     */
    public function __construct($config)
    {
        parent::__construct($config);
        if (isset($config['page']) && isset($config['perPage'])) {
            $this->umeng = new Umeng($config['apiKey'], $config['apiSecurity'], $config['page'], $config['perPage']);
        } else {
            $this->umeng = new Umeng($config['apiKey'], $config['apiSecurity']);
        }
    }

    public function __call($name, $arguments)
    {
        $this->umeng->{$name}(...$arguments);
    }
}