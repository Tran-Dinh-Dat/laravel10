<?php

namespace App\Reffect;

class Mail implements MessageInterface
{
    public function send()
    {
        dd('something happens by Mail');
    }
}