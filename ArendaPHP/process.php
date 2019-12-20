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

if (isset($_POST['marka'])) {
    require('connect_bd.php');
    $result = mysqli_query($dbc, 'SELECT * FROM users WHERE ВУ = ' . $_COOKIE['Licence'] . ';');
    $result = mysqli_fetch_array($result);
    $name = $result[0];
    $surname = $result[1];
    $sursurname = $result[2];
    $licence = $result[3];
    $phone = $result[4];

    if (!empty(trim($_POST['marka']))) {
        $marka = trim(addslashes($_POST['marka']));
    } else {
        fail('автомобиль');
    }

    if (!empty(trim($_POST['date']))) {
        $date = trim(addslashes($_POST['date']));
    } else {
        fail('дату');
    }

    if (!empty(trim($_POST['number']))) {
        $number = trim(addslashes($_POST['number']));
    } else {
        fail('длительность аренды');
    }
    $sql = 'SELECT contract.Дата ,
            DATE_ADD(contract.Дата, INTERVAL contract.Длительность DAY) AS ДатаО 
            FROM contract, auto 
            WHERE auto.Рег_номер = contract.Рег_номер 
            and auto.ID = ' . $marka . ';';
    $dat = mysqli_query($dbc, $sql);
    $result = mysqli_fetch_array($dat, MYSQLI_ASSOC);
    while ($result = mysqli_fetch_array($dat, MYSQLI_ASSOC)) {
        $datal = strtotime($date) + ($number * 24 * 60 * 60);
        if (strtotime($date) <= strtotime($result['ДатаО']) && $datal >= strtotime($result['Дата'])) {
            fail('Машина на данную дату занята', false);
        }
    }
    $price = mysqli_query($dbc, 'SELECT Стоимость FROM price WHERE ID = ' . $marka . ';');
    $price = mysqli_fetch_array($price)[0];
    $price *= $number;
    $regnomer = mysqli_query($dbc, 'SELECT Рег_номер FROM auto WHERE ID = ' . $marka . ';');
    $regnomer = mysqli_fetch_array($regnomer)[0];
    $sql = "INSERT INTO users (Имя, Фамилия, Отчество, ВУ, Номер_телефона)
    VALUES
    ('$name','$surname','$sursurname','$licence','$phone')";
    mysqli_query($dbc, $sql);
    $sql = "INSERT INTO contract (Рег_номер, ВУ, Дата, Длительность, Стоимость)
    VALUES
    ('$regnomer','$licence','$date','$number','$price')";
    mysqli_query($dbc, $sql);
}
if (mysqli_affected_rows($dbc) != 1) {
    echo '<p>Ошибка</p>' . mysqli_error($dbc);
    mysqli_close($dbc);
} else {
    mysqli_close($dbc);
    header('Location: contract.php');
//    echo"<meta http-equiv='refresh' content='0; url= contract.php'>";
}