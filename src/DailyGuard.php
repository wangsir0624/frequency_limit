<?php
namespace Wangjian\FrequencyLimit;

class DailyGuard extends AbstractGuard
{
    public function getDuration()
    {
        return 86400;
    }

    public function getName()
    {
        return 'daily_limit';
    }
}