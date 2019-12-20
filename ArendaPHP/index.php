<?php
$page_title = 'РНР-форум';
echo '<link rel="stylesheet" href="style.css">';
require('connect_bd.php');
echo '<title>Главная</title>';
$sql = 'SELECT * FROM auto, model, color, carcass, gearbox, price WHERE auto.ID = model.ID and auto.ID = color.ID and auto.ID = carcass.ID and auto.ID = gearbox.ID and auto.ID = price.ID;';
$result = mysqli_query($dbc, $sql);
if (!empty($_COOKIE['Licence'])){
    $sql = 'SELECT Имя, Фамилия, Отчество FROM users WHERE ВУ = \''.$_COOKIE['Licence'].'\';';
    $h1query = mysqli_query($dbc, $sql);
    $h1 = mysqli_fetch_array($h1query,MYSQLI_ASSOC);
    echo '<h1>Здравствуйте '.$h1['Фамилия'].' '.$h1['Имя'].' '.$h1['Отчество'].'</h1>';
    echo '<div class="navi">';
    if ($_COOKIE['Admin']){
        echo '<p><a href="edit_auto.php">Редактирование авто</a></p>';
    }
    echo '<p><a href="post.php">Создать договор</a></p>';
    echo '<p ><a href="allcontract.php">Прошлые договоры</a></p>';
    echo '<p><a href="logout.php">Выход</a></p>';
    echo '</div>';
}else{
    echo '<p id="but"><a href="autoreg.php">Авторизация</a></p>';
    echo '</div>';
}

if (mysqli_num_rows($result) > 0) {
    echo '<div class="tr">';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<div class="car">';
            echo '<p>' .'Рег.Номер: '. $row['Рег_номер'] . '</p>';
            echo '<p>' .'Марка: '. $row['Марка'] . '</p>';
            echo '<p>' .'Модель: '. $row['Модель'] . '</p>';
            echo '<p>' .'Цвет: '. $row['Цвет'] . '</p>';
            echo '<p>' .'Тип кузова: '. $row['Тип_кузова'] . '</p>';
            echo '<p>' .'Коробка передач: '. $row['КПП'] . '</p>';
            echo '<p>' .'Цена за день: '. $row['Стоимость'].'руб.'. '</p></div>';
    }
    echo '<div class="tr">';
} else {
    echo '<p>В настоящее время сообщений нет.</p>';
}
mysqli_close($dbc);