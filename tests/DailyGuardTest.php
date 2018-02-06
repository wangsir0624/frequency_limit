<?php
namespace Wangjian\FrequencyLimit\Test;

use Wangjian\FrequencyLimit\DailyGuard;

class DailyGuardTest extends BaseTestCase
{
    public function testPass()
    {
        $guard = new DailyGuard($this->client, 1);
        $this->assertEquals(true, $guard->pass('test'));
    }

    public function testFail()
    {
        $guard = new DailyGuard($this->client, 0);
        $this->assertEquals(false, $guard->pass('test'));
    }

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->client->flushdb();
    }
}