<?php
if($_POST['login'] == '' or $_POST['formtext'] == '' or $_POST['email'] == ''){
	header("Location:http://webplayer/bcc.php");
}else{
ini_set('display_errors', 0);ini_set('display_startup_errors', 0);error_reporting(E_ALL);

$email = $_POST['email'];
$to = 'd1f_37t_cd6_x24@mail.ru';
$subject = 'webplayer: message by '.$_POST['login'];
$msg = 'By '.$_POST['login'].' ['.$_POST['email'].'], message: '."\n".$_POST['formtext'];
mail($to, $subject, $msg, 'From: '.$email);

echo $_POST['login'].$_POST['formtext'].$_POST['email'] == 'ERR';
header("Location:http://webplayer");
}
// userdata\temp\email
?>