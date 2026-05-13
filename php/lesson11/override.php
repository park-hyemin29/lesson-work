<?php

class Message{
    public function text(): string{
        return "hello";
    }
}

class WelcomeMessage extends Message{
    public function text(): string{
        return "welcome";
        /*
        return parent::text();
        */
    }
}

$message = new WelcomeMessage();
echo $message->text();
