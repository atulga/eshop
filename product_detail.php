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
if (!$_GET['id']) { ?>
    <a href="/tool/index.php">[Нэвтрэх]</a>
<?php } else {
	$id = $_GET['id'];
	$u_type = $_GET['t'];
    switch ($u_type) {
        case 'merchant':
            echo 'Тавтай морил! <strong>Худалдагч №1.</strong> <a href="add_product.php?t=merchant">[Бараа нэмэх]</a>';
			echo '<a href="/">[Гарах]</a>';
            break;
    }
?>
	<a href="/index.php?t=<?=$u_type ?>">[Нүүр хуудас]</a>
<?php
    if ($u_type != '' && $u_type != 'guest') {
        echo '<a href="/">[Гарах]</a>';
    }
}
?>
    <hr>
    <h2>Барааны дэлгэрэнгүй</h2>
    <hr>
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
				<td><a href="buy_product.php?t=<?=$u_type?>&id=<?=$row['0'] ?>">[Худалдан авах]</td>
            </tr>
			<?php } ?>
        </table>
<?php }
    mysqli_close($db);
?>
</body>
</html>