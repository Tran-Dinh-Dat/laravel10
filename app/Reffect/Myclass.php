<?php

namespace App\Reffect;

class Myclass
{
    public $message;

    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    public function run()
    {
        $this->message->send();
    }
}