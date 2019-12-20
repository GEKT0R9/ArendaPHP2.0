<?php
echo '<link rel="stylesheet" href="style.css">';
require('connect_bd.php');
if (empty($_POST)) {
    echo '<div><form action="edit_auto.php" method="post" accept-charset="UTF-8"><p>';
    $result = mysqli_query($dbc, 'SELECT * FROM auto, model where auto.ID = model.ID');
    if (mysqli_num_rows($result) > 0) {
        echo '<select class="form-control" name="marka">' .
            '<option value="Выберите автомобиль" selected="" disabled="">Выберите автомобиль</option>';
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<option value="' . $row['ID'] . '">' . $row['Марка'] . ' ' . $row['Модель'] . '</option>';
        }
        echo '</select></p>';
    } else {
        echo '<p>В настоящее время машин нет.</p>';
    }
    echo '<p><input id="butt" type="submit" value="Редактировать"></p>';
    echo '</form></div>';
} else {
    setcookie('ID_auto',$_POST['marka']);
    $sql = 'SELECT * FROM auto, model, color, carcass, gearbox, price 
                WHERE auto.ID = model.ID 
                and auto.ID = color.ID 
                and auto.ID = carcass.ID 
                and auto.ID = gearbox.ID 
                and auto.ID = price.ID
                and auto.ID = '.$_POST['marka'].';';
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo '<div><form action="process_auto.php" method="post" accept-charset="UTF-8">
<p>Марка:<input name="mark" type="text" value="'.$row['Марка'].'"></p>
<p>Модель: <input name="model" type="text" value="'.$row['Модель'].'"></p>
<p>Рег. номер: <input name="R_number" type="text" value="'.$row['Рег_номер'].'"></p>
<p>Тип кузова: <input name="carcass" type="text" value="'.$row['Тип_кузова'].'"></p>
<p>Цвет: <input name="color" type="text" value="'.$row['Цвет'].'"></p>
<p>КПП: <input name="gearbox" type="text" value="'.$row['КПП'].'"></p>
<p>Цена за день: <input name="price" type="text" value="'.$row['Стоимость'].'"></p>
<p><input id="butt" type="submit" value="Изменить"></p>
</form></div>';
}
