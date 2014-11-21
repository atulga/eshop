<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="static/style.css">
<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.min.css">

<title>Online shop</title>
</head>

<body style="width: auto; background-color:#efefeb">
<?php
$config = parse_ini_file("config.ini");
if (!$_GET['t']) { ?>
    <a href="<?=$config['domain'] ?>tool/index.php">[Нэвтрэх]</a>
<?php } else {
    switch ($_GET['t']) {
        case 'merchant':
            echo 'Тавтай морил! <strong>Худалдагч №1.</strong> <a href="'.$config['domain'].'add_product.php?t=merchant">[Бараа нэмэх]</a>';
            break;
        case 'delivery':
            echo 'Тавтай морил! <strong>Хүргэгч №1.</strong>';
            break;
        default:
            break;
    }
?>
    <a href="<?=$config['domain'] ?>">[Гарах]</a>
<?php } ?>
    <hr>
    <div><?php include_once("header.html"); ?></div>
<div class="container">
    <h3>Сүүлд нэмэгдсэн бараанууд</h3>
<ul style="list-style:none">
<?php
    require_once("db.php");
    $sql = "SELECT * FROM `product` ORDER BY `created_at` DESC";
    $r = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_row($r)) {
?>
    <li class="tl">
        <table>
            <tr>
                <td colspan="2">
                    <a href="<?=$config['domain'] ?>product_detail.php?t=<?=$_GET['t']?>&id=<?=$row[0] ?>">
                    <img src="static/images/<?= isset($row['pic']) ? $row['pic'] : "no_image.png"?>"/>
                    </a>
                </td>
            </tr>
            <tr>
                <td colspan="2"><strong><?=$row['1'] ?></strong></td>
            </tr>
            <tr>
                <td>Үнэ: <?=$row['2'] ?>₮</td>
                <td><?=$row['4'] ?></td>
            </tr>
            <tr>
                <td colspan="2"><?=substr($row['3'], 0, 30)?> <?=strlen($row['3'])>30?"...":""?> </td>
            </tr>
        </table>
    </li>
<?php }
    mysqli_close($db);
?>
</ul>
</div>
    <div><?php include_once("footer.html"); ?></div>
</body>
</html>
