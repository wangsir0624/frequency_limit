<?php
namespace Wangjian\FrequencyLimit;

class SecondGuard extends AbstractGuard
{
    protected function getDuration()
    {
        return 1;
    }

    protected function getName()
    {
        return 'second_limit';
    }
}