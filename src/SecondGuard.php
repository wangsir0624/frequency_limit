<?php
namespace Wangjian\FrequencyLimit;

class SecondGuard extends AbstractGuard
{
    public function getDuration()
    {
        return 1;
    }

    public function getName()
    {
        return 'second_limit';
    }
}