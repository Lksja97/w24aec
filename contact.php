<?php  
require_once(".\layout\header.php");
require_once(".\app\controller\contactController.php");
$controller = new ContactController();
$result = $controller->sendMessage();
?>
    

<h1>Contact us form</h1>
<?=$result?>
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
