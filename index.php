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
if (!$_GET['t']) { ?>
    <a href="/tool/index.php">[Нэвтрэх]</a>
<?php } else {
    switch ($_GET['t']) {
        case 'merchant':
            echo 'Тавтай морил! <strong>Худалдагч №1.</strong> <a href="add_product.php?t=merchant">[Бараа нэмэх]</a>';
            break;
        case 'delivery':
            echo 'Тавтай морил! <strong>Хүргэгч №1.</strong>';
            break;
        default:
            break;
    }
?>
    <a href="/">[Гарах]</a>
<?php } ?>
    <hr>
    <h2>Нүүр хуудас</h2>
    <hr>
    <h4>Барааны жагсаалт</h4>
<?php
    require_once("db.php");
    $sql = "SELECT * FROM `product` ORDER BY `created_at` DESC";
    $r = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_row($r)) {
?>
        <table>
            <tr>
                <td colspan="2">
                    <a href="product_detail.php?t=<?=$_GET['t']?>&id=<?=$row[0] ?>">
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
<?php }
    mysqli_close($db);
?>
</body>
</html>
