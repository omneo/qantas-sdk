<?php

namespace Omneo\Qantas;

use Psr\Http;
use GuzzleHttp;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use Psr\Http\Message\RequestInterface;

class POSClient
{
    /**
     * Base URL.
     *
     * @var string
     */
    protected $base_url;

    /**
     * Username.
     *
     * @var string
     */
    protected $username;

    /**
     * Password.
     *
     * @var string
     */
    protected $password;

    /**
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * Client constructor.
     *
     * @param string $base_url
     */
    public function __construct($base_url)
    {
        $this->base_url = $base_url;

        $this->setupClient();
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->base_url;
    }

    /**
     * @param string $base_url
     * @return POSClient
     */
    public function setBaseUrl($base_url)
    {
        $this->base_url = $base_url;
        return $this;
    }

    /**
     * Return username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return POSClient
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Return password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return POSClient
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Set username and password.
     *
     * @param  string $username
     * @param  string $password
     * @return POSClient
     */
    public function setCredentials($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        return $this;
    }

    /**
     * Setup Guzzle client with optional provided handler stack.
     *
     * @param  GuzzleHttp\HandlerStack|null $stack
     * @param  array                        $options
     * @return POSClient
     */
    public function setupClient(GuzzleHttp\HandlerStack $stack = null, $options = [])
    {
        $stack = $stack ?: GuzzleHttp\HandlerStack::create();

        $this->bindHeadersMiddleware($stack);
        $this->bindBasicAuthMiddleware($stack);

        $this->client = new GuzzleHttp\Client(array_merge([
            'handler'  => $stack,
            'base_uri' => $this->getBaseUrl(),
        ], $options));

        return $this;
    }

    /**
     * Make a request.
     *
     * @param $method
     * @param $endpoint
     * @param array $params
     * @return Http\Message\ResponseInterface
     * @throws Exceptions\QantasException
     * @throws Exceptions\NotFoundException
     */
    public function request($method, $endpoint, array $params = [])
    {
        $response = $this->client->request(
            $method,
            $endpoint,
            $params
        );

        return json_decode((string) $response->getBody());
    }

    /**
     * Bind outgoing request middleware for headers.
     *
     * @param  GuzzleHttp\HandlerStack $stack
     * @return void
     */
    protected function bindHeadersMiddleware(GuzzleHttp\HandlerStack $stack)
    {
        $stack->push(GuzzleHttp\Middleware::mapRequest(function (RequestInterface $request) {
            return $request
                ->withHeader('Content-type', 'application/json');
        }));
    }

    /**
     * Bind basic auth middleware for headers.
     *
     * @param  GuzzleHttp\HandlerStack $stack
     * @return void
     */
    protected function bindBasicAuthMiddleware(GuzzleHttp\HandlerStack $stack)
    {
        if(!($this->getUsername() && $this->getPassword())) return;
        $stack->push(GuzzleHttp\Middleware::mapRequest(function (RequestInterface $request) {
            return $request
                ->withHeader('Authorization', ['Basic ' . base64_encode($this->getUsername() . ':' . $this->getPassword())]);
        }));
    }

    /**
     * Member module.
     *
     * @return Modules\Members
     */
    public function members()
    {
        return new Modules\Members($this);
    }

    /**
     * Transaction module.
     *
     * @return Modules\Transactions
     */
    public function transactions()
    {
        return new Modules\Transactions($this);
    }

}
