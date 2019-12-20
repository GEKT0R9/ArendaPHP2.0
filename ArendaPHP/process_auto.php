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
    if (!empty($_COOKIE['ID_auto'])) {
        $sql = 'UPDATE auto SET Рег_номер = \'' . $R_number . '\', Марка = \'' . $mark . '\' WHERE ID = ' . $_COOKIE['ID_auto'] . ';';
        if (!($dat = mysqli_query($dbc, $sql))) {
            fail('Ошибка заполнения поля рег. номера или марки', false);
        }
        $sql = 'UPDATE model SET Модель = \'' . $model . '\' WHERE ID = ' . $_COOKIE['ID_auto'] . ';';
        if (!($dat = mysqli_query($dbc, $sql))) {
            fail('Ошибка заполнения поля модели', false);
        }
        $sql = 'UPDATE carcass SET Тип_кузова = \'' . $carcass . '\' WHERE ID = ' . $_COOKIE['ID_auto'] . ';';
        if (!($dat = mysqli_query($dbc, $sql))) {
            fail('Ошибка заполнения поля тип кузова', false);
        }
        $sql = 'UPDATE color SET Цвет = \'' . $color . '\' WHERE ID = ' . $_COOKIE['ID_auto'] . ';';
        if (!($dat = mysqli_query($dbc, $sql))) {
            fail('Ошибка заполнения поля цвет', false);
        }
        $sql = 'UPDATE gearbox SET КПП = \'' . $gearbox . '\' WHERE ID = ' . $_COOKIE['ID_auto'] . ';';
        if (!($dat = mysqli_query($dbc, $sql))) {
            fail('Ошибка заполнения поля кпп', false);
        }
        $sql = 'UPDATE price SET Стоимость = \'' . $price . '\' WHERE ID = ' . $_COOKIE['ID_auto'] . ';';
        if (!($dat = mysqli_query($dbc, $sql))) {
            fail('Ошибка заполнения поля цена', false);
        }
        SetCookie("ID_auto", "");
        mysqli_close($dbc);
        header('Location: index.php');
    } else {
        $sql = "INSERT INTO auto (Рег_номер, Марка)
    VALUES
    ('$R_number','$mark')";
        mysqli_query($dbc,$sql);

        $sql = 'SELECT ID FROM auto WHERE Рег_номер = \''.$R_number.'\';';
        $varID = mysqli_query($dbc,$sql);
        $varID = mysqli_fetch_array($varID);
        $varID = $varID['ID'];
        $sql = "INSERT INTO model (ID,Модель)
    VALUES
    ('$varID','$model')";
        mysqli_query($dbc,$sql);
        $sql = "INSERT INTO carcass (ID,Тип_кузова)
    VALUES
    ('$varID','$carcass')";
        mysqli_query($dbc,$sql);
        $sql = "INSERT INTO color (ID,Цвет)
    VALUES
    ('$varID','$color')";
        mysqli_query($dbc,$sql);
        $sql = "INSERT INTO gearbox (ID,КПП)
    VALUES
    ('$varID','$gearbox')";
        mysqli_query($dbc,$sql);
        $sql = "INSERT INTO price (ID,Стоимость)
    VALUES
    ('$varID','$price')";
        mysqli_query($dbc,$sql);
    }
    mysqli_close($dbc);
    header('Location: index.php');
}

//    echo"<meta http-equiv='refresh' content='0; url= contract.php'>";