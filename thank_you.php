<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shop</title>
</head>

<body>
<?php
$config = parse_ini_file("config.ini");
require_once "swiftmailer/lib/swift_required.php";

$buyer_email = $config['user']."@mailinator.com";
$merchant_email = $config['merchant']."@mailinator.com";
$delivery_email = $config['delivery']."@mailinator.com";

$body_message_for_buyer = "Таны худалдан авалт амжилттай боллоо.";
$body_message_for_merchant = "Таны барааг User 1 худалдан авсан байна.";
$body_message_for_delivery = "User 1 ийн хаягаар хүргэлт хийнэ үү.";

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
    ->setUsername('bdummy12793@gmail.com')
    ->setPassword('helloGuyes1');

$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance('Web Lead')
    ->setFrom(array('bdummy12793@gmail.com' => 'eshop'))
    ->setTo(array($buyer_email => 'Хүлээн авагч'))
    ->setSubject('Бараа худалдан авсан тухай')
    ->setBody($body_message_for_buyer,'text/html');
$result = $mailer->send($message);

$message = Swift_Message::newInstance('Web Lead')
    ->setFrom(array('bdummy12793@gmail.com' => 'eshop'))
    ->setTo(array($merchant_email => 'Хүлээн авагч'))
    ->setSubject('Бараа худалдан авсан тухай')
    ->setBody($body_message_for_merchant,'text/html');
$result = $mailer->send($message);

$message = Swift_Message::newInstance('Web Lead')
    ->setFrom(array('bdummy12793@gmail.com' => 'eshop'))
    ->setTo(array($delivery_email => 'Хүлээн авагч'))
    ->setSubject('Бараа худалдан авсан тухай')
    ->setBody($body_message_for_delivery,'text/html');
$result = $mailer->send($message);

// example TDB email
$message1 = Swift_Message::newInstance('TDB')
    ->setFrom(array('bdummy12793@gmail.com' => 'TDB'))
    ->setTo(array($buyer_email  => 'Хүлээн авагч'))
    ->setSubject('Гүйлгээний мэдээлэл')
    ->setBody('Таны гүйлгээ амжилттай хийгдлээ','text/html');

$result = $mailer->send($message1);
?>
    Худалдан авалт хийсэн танд баярлалаа!<p />
    Таны e-mail хаяг руу бараа хүлээн авахтай холбоотой мэдээллийг явуулсан болно.<p />
    <a href="http://<?=$config['domain'] ?>">[Нүүр хуудас]</a>
</body>
</html>

