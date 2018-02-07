<?php
namespace Wangjian\FrequencyLimit;

use Predis\Client;

abstract class AbstractGuard implements GuardInterface
{
    /**
     * predis client
     * @var Client
     */
    protected $client;

    /**
     * guard prefix
     * @var string
     */
    protected $prefix;

    /**
     * max frequency
     * @var int
     */
    protected $limit;

    /**
     * AbstractGuard constructor
     * @param Client $client
     * @param int $limit
     * @param string $prefix
     */
    public function __construct(Client $client, $limit, $prefix = '')
    {
        $this->client = $client;
        $this->limit = $limit;
        $this->prefix = $prefix;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function pass($value)
    {
        $luaScript = <<<EOT
if redis.call("setnx", KEYS[1], 0) then
    redis.call("expire", KEYS[1], ARGV[2])
end
if (redis.call("get", KEYS[1]) - ARGV[1]) >= 0 then
    return 0
else
    redis.call("incr", KEYS[1])
    return 1
end
EOT;

        return $this->client->eval($luaScript, 1, $this->prefix . (empty($this->prefix) ? '' : ':') . $this->getName() . ':' . $value, $this->limit, $this->getDuration()) > 0;
    }

    /**
     * get the guard duration
     * @return int
     */
    abstract protected function getDuration();

    /**
     * get the guard name
     * @return string
     */
    abstract protected function getName();
}