<?php


namespace oberdex\youmengsdk;


use Hanson\Foundation\Foundation;

/**
 * Class SDK
 * @package oberdex\youmengsdk
 * @Method getAppList 获取所有app
 */
class SDK extends Foundation
{
    private $sdk;

    /**
     * SDK constructor.
     * @param $sdk
     */
    public function __construct($config)
    {
        parent::__construct($config);
        if (isset($config['page']) && isset($config['perPage'])) {
            $this->sdk = new Umeng($config['apiKey'], $config['apiSecurity'], $config['page'], $config['perPage']);
        } else {
            $this->sdk = new Umeng($config['apiKey'], $config['apiSecurity']);
        }
    }

    public function __call($name, $arguments)
    {
        $this->sdk->{$name}(...$arguments);
    }
}