<?php

namespace App\Reffect;

class Slack implements MessageInterface
{
    public function send()
    {
        dd('something happens by Slack');
    }
}