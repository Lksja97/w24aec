<?php
require_once("./app/Message.php");
class ContactController
{

    public function sendMessage(): string|null
    {
        if (isset($_POST["body"])) {
            $visitor_message = new Message();
            $visitor_message->body = $_POST["body"];
            $visitor_message->mobileNumber = $_POST["visitor_phone_number"];
            $visitor_message->senderEmail = $_POST["visitor_email"];
            $visitor_message->senderName = $_POST["visitor_name"];
            unset($_POST);

            $send_result = $visitor_message->send();
            if ($send_result) {
                return "successful sended message";
            } else {
                return "sorry try later!";
            }

        }
        return null;
    }

}