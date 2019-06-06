<?php

namespace Omneo\Qantas\Modules;

use Omneo\Qantas;

abstract class AbstractModule
{
    /**
     * @var Qantas\POSClient
     */
    protected $client;

    /**
     * Abstract Module constructor.
     *
     * @param Qantas\POSClient|null $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}
