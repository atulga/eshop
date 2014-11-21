<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shop</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php $config = parse_ini_file("../config.ini"); ?>
	<label>Худалдан авагч: </label> <a href="http://eshop.dev?t=user" >[Нэвтрэх]</a> <a href="http://www.mailinator.com/inbox.jsp?to=<?=$config['user']?>" target="_blank">[Email шалгах]</a><p />
<label>Зочин: </label> <a href="http://eshop.dev" >[Нэвтрэх]</a> <a href="http://www.mailinator.com/inbox.jsp?to=<?=$config['guest']?>" target="_blank">[Email шалгах]</a><p />
<label>Борлуулагч: </label> <a href="http://eshop.dev?t=merchant" >[Нэвтрэх]</a> <a href="http://www.mailinator.com/inbox.jsp?to=<?=$config['merchant']?>" target="_blank">[Email шалгах]</a><p />
<label>Хүргэгч: </label> <a href="http://eshop.dev?t=delivery" >[Нэвтрэх]</a> <a href="http://www.mailinator.com/inbox.jsp?to=<?=$config['delivery']?>" target="_blank">[Email шалгах]</a><p />
<label>E-Хүргэгч: </label> <a href="http://eshop.dev?t=edelivery" >[Нэвтрэх]</a> <a href="http://www.mailinator.com/inbox.jsp?to=<?=$config['edelivery']?>" target="_blank">[Email шалгах]</a><p />
</body>
</html>
