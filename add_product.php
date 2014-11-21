<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shop</title>
<link rel="stylesheet" type="text/css" href="static/style.css">
<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
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
			$product_id = mysqli_insert_id($db);
		}

		$img_dir = "static/images/";
		$file_name = $_FILES['pic']['name'];
		$tmp_name = $_FILES['pic']['tmp_name'];

		$check = getimagesize($tmp_name);
		if ($check !== false) {
			if (move_uploaded_file($tmp_name, "$img_dir/$file_name")) {
				$sql = "INSERT INTO `product_pic` (`id`, `product_id`, `file`, `comment`) VALUES (NULL, '$product_id', '$file_name', '$comment')";
				$r = mysqli_query($db, $sql);
			}
		}

		mysqli_close($db);
	}
?>
Тавтай морил! <strong>Худалдагч №1.</strong> <a href="<?=$config['domain']?>index.php?t=merchant">[Нүүр хуудас]</a> <a href="<?=$config['domain'] ?>">[Гарах]</a> <hr>
<div><?php include_once("header.html"); ?></div>
<div class="container">
	<h3>Бараа нэмэх хэсэг</h3>
	<?php if (strlen($message)) {
		echo $message;
	}?>
<form action="" method="post" enctype="multipart/form-data">
<table>
	<tr>
		<td>Нэр:</td>
		<td><input type="text" name="name" value="<?=$name ?>"></td>
	</tr>
	<tr>
		<td>Зураг:</td>
		<td>
			<input type="file" name="pic" value="<?=$pic ?>">
		</td>
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
</div>
<div><?php include_once("footer.html"); ?></div>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
