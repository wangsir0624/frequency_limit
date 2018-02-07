<?php
namespace Wangjian\FrequencyLimit;

class HourlyGuard extends AbstractGuard
{
    public function getDuration()
    {
        return 3600;
    }

    public function getName()
    {
        return 'hourly_limit';
    }
}