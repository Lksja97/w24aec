<?php

class Message {
    public string $body;
    public ?string $senderName;

    public ?string $senderEmail;
    public ?string $mobileNumber;

    public function __construct()
    {
        $this->senderName = null;
        $this->senderEmail = null;
        $this->mobileNumber = null;
    }
    public function send():bool{
        return false;
    }

}