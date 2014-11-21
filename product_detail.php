<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online shop</title>
<link rel="stylesheet" type="text/css" href="static/style.css">
<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">
</head>

<body style="width: auto; background-color:#efefeb">
<?php
$config = parse_ini_file("config.ini");
if (!$_GET['id']) { ?>
	<a href="<?=$config['domain']?>tool/index.php">[Нэвтрэх]</a>
<?php } else {
	$id = $_GET['id'];
	$u_type = $_GET['t'];
    switch ($u_type) {
        case 'merchant':
            echo 'Тавтай морил! <strong>Худалдагч №1.</strong> <a href="'.$config['domain'].'add_product.php?t=merchant">[Бараа нэмэх]</a>';
			echo '<a href="'.$config['domain'].'">[Гарах]</a>';
            break;
    }
?>
	<a href="<?=$config['domain'] ?>index.php?t=<?=$u_type ?>">[Нүүр хуудас]</a>
<?php
    if ($u_type != '' && $u_type != 'guest') {
        echo '<a href="'.$config['domain'].'">[Гарах]</a>';
    }
}
?>
    <hr>
    <div><?php include_once("header.html"); ?></div>
<div class="container">
    <h2>Барааны дэлгэрэнгүй</h2>
<?php
    require_once("db.php");
    $sql = "SELECT * FROM `product` WHERE id = $id";
    $r = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_row($r)) {
?>
        <table>
            <tr>
                <td><img src="static/images/<?= isset($row['pic']) ? $row['pic'] : "no_image.png"?>"/></td>
            </tr>
            <tr>
                <td><strong><?=$row['1'] ?></strong></td>
            </tr>
            <tr>
                <td>Үнэ: <?=$row['2'] ?>₮</td>
            </tr>
            <tr>
                <td>Бараа нэмэгдсэн огноо: <?=$row['4'] ?></td>
            </tr>
            <tr>
                <td><?=$row['3'] ?></td>
            </tr>
			<?php if (strlen($u_type)>0 && $u_type !== 'guest') { ?>
            <tr>
				<td><a href="<?=$config['domain'] ?>buy_product.php?t=<?=$u_type?>&id=<?=$row['0'] ?>">[Худалдан авах]</td>
            </tr>
			<?php } ?>
        </table>
<?php }
    mysqli_close($db);
?>
</div>
<div><?php include_once("footer.html"); ?></div>
</body>
</html>
