<?php
require('connect_bd.php');
echo '<title>Контракт</title>';
echo '<link rel="stylesheet" href="style.css">';

$sql = 'SELECT * FROM users, contract, auto, model, color, carcass WHERE users.ВУ = contract.ВУ and auto.Рег_номер = contract.Рег_номер and auto.ID = model.ID and auto.ID = color.ID and auto.ID = carcass.ID and users.ВУ = '.$_COOKIE['Licence'].';';
$result = mysqli_query($dbc, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<div class="tr">';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<div class="car">';
        echo '<p>Номер договора: '.$row['ID_contract'].'</p>';
        echo '<p>Рег.номер машины: ['.$row['Рег_номер'].']</p>';
        echo '<p>Начало действия: '.$row['Дата'].'</p>';
        echo '<p>Длительность: '.$row['Длительность'].' дней</p>';
        echo '<p>Машина: '.$row['Марка'].' '.$row['Модель'].'</p>';
        echo '<p>Цвет: '.$row['Цвет'].'</p>';
        echo '<p>Тип кузова: '.$row['Тип_кузова'].'</p>';
        echo '<p>Итоговая стоимость: '.$row['Стоимость'].'</p>';
        echo '</div>';
    }
    echo '<div class="tr">';
} else {
    echo '<h1>Вы не заключали договоры.</h1>';
}
echo '<p id="but"><a href="index.php">На главную</a></p>';