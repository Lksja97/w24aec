<?php

class Message {
    public string $body;
    public string $senderName;

    public string $senderEmail;
    public string $mobileNumber;


    public function send():bool{
        return false;
    }

}