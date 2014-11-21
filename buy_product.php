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
    <a href="<?=$config['domain'] ?>tool/index.php">[Нэвтрэх]</a>
<?php } else {
    $id = $_GET['id'];
    $u_type = $_GET['t'];
    switch ($u_type) {
        case 'merchant':
            echo 'Тавтай морил! <strong>Худалдагч №1.</strong> <a href='.$config['domain'].'add_product.php?t=merchant">[Бараа нэмэх]</a>';
            echo '<a href="/">[Гарах]</a>';
            break;
    }
?>
    <a href="<?=$config['domain'] ?>index.php?t=<?=$u_type ?>">[Нүүр хуудас]</a>
<?php
    if ($u_type != 'guest') {
        echo '<a href="'.$config['domain'].'">[Гарах]</a>';
    }
}
?>
<hr/>
<div><?php include_once("header.html"); ?></div>
<div class="container">
    <h3>Та дараах барааг худалдан авхаар сонгосон байна</h3>
<?php
    require_once("db.php");
    $sql = "SELECT * FROM `product` WHERE id = $id";
    $r = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_row($r)) {
?>
        <table border="1">
            <tr>
                <th>Барааны мэдээлэл</th>
                <th>Нэгжийн үнэ</th>
                <th>Тоо/Ширхэг</th>
                <th>Нийт үнэ</th>
            </tr>
            <tr>
                <td><strong><?=$row['1'] ?></strong> / <?=$row['3'] ?></td>
                <td>Үнэ: <?=$row['2'] ?>₮</td>
                <td>
                    <select>
                    <?php for ($i = 1; $i < 10; $i++) { ?>
                    <option value="<?=$i ?>"><?=$i ?></option>
                    <?php }?>
                    </select>
                </td>
                <td><?=$row['2'] ?>₮</td>
            </tr>
        </table>
        <br />
        <a href="<?=$config['domain'] ?>pages/step1.html">[Тооцоо хийх]</a>
<?php }
    mysqli_close($db);
?>
</div>
<div><?php include_once("footer.html"); ?></div>
</body>
</html>
