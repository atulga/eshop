<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shop</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$config = parse_ini_file("config.ini");

if ($_GET['t'] !== "merchant") {
	header('Location: http://'.$config['domain']);
} else {
	if ($_POST['add'] && $_POST['name']) {
		$message = "";
		$name = $_POST['name'];
		$price = $_POST['price'];
		$comment = $_POST['comment'];

		require_once("db.php");
		$created_at = date('Y-m-d H:i:s');
		$sql = "INSERT INTO `product` (`id`, `name`, `price`, `comment`, `created_at`) VALUES (NULL, '$name', '$price', '$comment', '$created_at')";
		$r = mysqli_query($db, $sql);
		if ($r) {
			$message = "Бараа амжилттай нэмэгдлээ!";
		}

		mysqli_close($db);
	}
?>
	Тавтай морил! <strong>Худалдагч №1.</strong> <a href="index.php?t=merchant">[Нүүр хуудас]</a> <a href="/">[Гарах]</a> <hr>
	<h2>Бараа нэмэх хэсэг</h2>
	<?php if (strlen($message)) {
		echo $message;
	}?>
<form action="" method="post">
<table>
	<tr>
		<td>Нэр:</td>
		<td><input type="text" name="name" value="<?=$name ?>"></td>
	</tr>
	<tr>
		<td>Зураг:</td>
		<td><input type="text" name="pic" value="<?=$pic ?>"></td>
	</tr>
	<tr>
		<td>Тайлбар:</td>
		<td><input type="text" name="comment" value="<?=$comment ?>"></td>
	</tr>
	<tr>
		<td>Үнэ:</td>
		<td><input type="text" name="price" value="<?=$price ?>"> ₮</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="add" value="Нэмэх"></td>
	</tr>
</table>

</form>
<?php } ?>
</body>
</html>
