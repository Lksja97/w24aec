<?php  
require_once(".\layout\header.php");
require_once(".\app\Message.php");
// $visitor_message ist ein Instance von Objekt Message , 
//$visitor_message ist jetzt in Ram!!

if(isset($_POST["body"]))
{
    $visitor_message = new Message();
    $visitor_message->body = $_POST["body"];
    $visitor_message->mobileNumber = $_POST["visitor_phone_number"];
    $visitor_message->senderEmail = $_POST["visitor_email"];
    $visitor_message->senderName = $_POST["visitor_name"];    
    unset($_POST);
    
    $send_result = $visitor_message->send(); 
    if($send_result){
        echo "successful sended message";
    }
    else
    {
        echo "sorry try later!";
    }

}

?>
    

<h1>Contact us form</h1>

<form  method="post">
    <textarea name="body" placeholder="your message" required minlength="10" maxlength="900"></textarea>
    <br/>
    <br/>
    <input type="email" name="visitor_email"  placeholder="email optional" maxlength="120"/>
    <br/>
    <br/>
    <input type="text" name="visitor_name"  placeholder="your name optional" maxlength="60"/>
    <br/>
    <br/>
    <input type="string" name="visitor_phone_number"  placeholder="your tel number optional" minlength="8" maxlength="16"/>
    <br/>
    <br/>
    <button type="submit">senden</button>
</form>


<?php  require_once(".\layout\\footer.php") ?>
