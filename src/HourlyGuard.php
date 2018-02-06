<?php
namespace Wangjian\FrequencyLimit;

class HourlyGuard extends AbstractGuard
{
    public function getDuration()
    {
        return 86400;
    }

    public function getName()
    {
        return 'hourly_limit';
    }
}