<?php

function fail($str, $id = true)
{
    echo '<title>РНР- Ошибка</title>';
    echo '<link rel="stylesheet" href="style.css">';
    if ($id) {
        echo "<p>Пожалуйста, укажите $str.</p>";
    } else {
        echo "<p>$str.</p>";
    }
    echo "<p><a href='post.php'>Заполнить заново</a></p>";
    exit();
}

if (isset($_POST['price'])) {
    require('connect_bd.php');

    if (!empty(trim($_POST['mark']))) {
        $mark = trim(addslashes($_POST['mark']));
    } else {
        fail('марку');
    }

    if (!empty(trim($_POST['model']))) {
        $model = trim(addslashes($_POST['model']));
    } else {
        fail('модель');
    }

    if (!empty(trim($_POST['R_number']))) {
        $R_number = trim(addslashes($_POST['R_number']));
    } else {
        fail('рег. номер');
    }

    if (!empty(trim($_POST['carcass']))) {
        $carcass = trim(addslashes($_POST['carcass']));
    } else {
        fail('тип кузова');
    }

    if (!empty(trim($_POST['color']))) {
        $color = trim(addslashes($_POST['color']));
    } else {
        fail('цвет');
    }

    if (!empty(trim($_POST['gearbox']))) {
        $gearbox = trim(addslashes($_POST['gearbox']));
    } else {
        fail('КПП');
    }

    if (!empty(trim($_POST['price']))) {
        $price = trim(addslashes($_POST['price']));
    } else {
        fail('цену');
    }

    $sql = 'UPDATE auto SET Рег_номер = '.$R_number.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
    $sql = 'UPDATE auto SET Марка = '.$mark.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
    $sql = 'UPDATE model SET Модель = '.$model.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
    $sql = 'UPDATE carcass SET Тип_кузова = '.$carcass.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
    $sql = 'UPDATE color SET Цвет = '.$color.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
    $sql = 'UPDATE gearbox SET КПП = '.$gearbox.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
    $sql = 'UPDATE price SET Стоимость = '.$price.' WHERE ID = '.$_COOKIE['ID_auto'].';';
    $dat = mysqli_query($dbc, $sql);
}
    SetCookie("ID_auto","");
    mysqli_close($dbc);
    header('Location: index.php');
//    echo"<meta http-equiv='refresh' content='0; url= contract.php'>";