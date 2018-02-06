<?php
namespace Wangjian\FrequencyLimit;

interface GuardInterface
{
    public function pass($value);
}