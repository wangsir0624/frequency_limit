<?php
namespace Wangjian\FrequencyLimit\Test;

use PHPUnit\Framework\TestCase;
use Predis\Client;

class BaseTestCase extends TestCase
{
    protected $client;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->client = new Client([
            'sheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379,
            'database' => 0
        ]);
    }
}