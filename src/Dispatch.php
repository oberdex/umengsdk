<?php


namespace oberdex\umengsdk;


use Hanson\Foundation\Foundation;

/**
 * Class Dispatch
 * @package oberdex\youmengsdk
 * @Method getAppList 获取所有app
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
        if (isset($config['page']) && isset($config['perPage'])) {
            $this->umengsdk = new Umeng($config['apiKey'], $config['apiSecurity'], $config['page'], $config['perPage']);
        } else {
            $this->umengsdk = new Umeng($config['apiKey'], $config['apiSecurity']);
        }
    }

    public function __call($name, $arguments)
    {
        $this->umengsdk->{$name}(...$arguments);
    }
}