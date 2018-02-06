<?php
namespace Wangjian\FrequencyLimit;

class MinuteGuard extends AbstractGuard
{
    protected function getDuration()
    {
        return 60;
    }

    protected function getName()
    {
        return 'minute_limit';
    }
}