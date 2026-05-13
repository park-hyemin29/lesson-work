<?php
class User{
    public string $name = "Taro";

    public function greet()
    {
        return "こんにちは、{$this->name}さん";
    }
}

$user = new User();
echo $user->greet();