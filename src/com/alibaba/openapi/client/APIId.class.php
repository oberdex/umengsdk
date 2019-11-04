<?php

namespace com\alibaba\openapi\client;
class APIId
{

    /**
     * namespace of API, it is required
     *
     * @var string
     */
    var $namespace;
    /**
     * name of API, it is required
     * @var string
     */
    var $name;
    /**
     * version of API, optional.
     * If not setup, the default version defined in requestPolicy is used.
     * @var integer
     */
    var $version;

    /**
     *
     * @param $namespace
     * @param $name
     * @param $version
     */
    public function APIId($namespace, $name, $version)
    {
        $this->namespace = $namespace;
        $this->name = $name;
        $this->version = $version;
    }

}