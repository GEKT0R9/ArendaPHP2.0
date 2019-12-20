<?
require('connect_bd.php');
if (empty($_POST)) {
    echo '<link rel="stylesheet" href="style.css">';
    echo '<div><form action="del_auto.php" method="post" accept-charset="UTF-8"><p>';
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
    echo '<p><input id="butt" type="submit" value="Удалить"></p>';
    echo '</form></div>';
} else {
    $sql = 'DELETE FROM price WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);

    $sql = 'DELETE FROM model WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);

    $sql = 'DELETE FROM gearbox WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);

    $sql = 'DELETE FROM color WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);

    $sql = 'DELETE FROM carcass WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);

    $sql = 'DELETE FROM auto WHERE ID = '.$_POST['marka'].';';
    mysqli_query($dbc,$sql);

    header('Location: index.php');
}