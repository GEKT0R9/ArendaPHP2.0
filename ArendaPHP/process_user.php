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
    echo "<p><a href='autoreg.php'>Заполнить заново</a></p>";
    exit();
}

function autoreg($dbc)
{

    $result = mysqli_query($dbc, 'SELECT Номер_телефона, Хэш, ВУ, Администратор FROM users WHERE Номер_телефона = ' . $_POST['number'] . ';');
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_array($result);
        if (password_verify($_POST['password'], $result[1])) {
            session_start();
            if ($result[3] > 0)
            {
                setcookie('Admin',true);
            }
            setcookie('Licence',$result[2]);
            return true;
        }
    }
    return false;
}

if (!(count($_POST) > 3)) {
    require('connect_bd.php');
    if (autoreg($dbc)) {
        header('Location: index.php');
    } else {
        fail('Неправильно введены данные', false);
    }
} else {

    if (!empty(trim($_POST['name']))) {
        $name = trim(addslashes($_POST['name']));
    } else {
        fail('имя');
    }

    if (!empty(trim($_POST['surname']))) {
        $surname = trim(addslashes($_POST['surname']));
    } else {
        fail('фамилию');
    }

    if (!empty(trim($_POST['sursurname']))) {
        $sursurname = trim(addslashes($_POST['sursurname']));
    } else {
        fail('отчество');
    }

    if (!empty($_POST['password'])) {
        $hash = password_hash($_POST['password'],PASSWORD_BCRYPT);
    } else {
        fail('пароль');
    }

    if (!empty(trim($_POST['licence']))) {
        $licence = trim(addslashes($_POST['licence']));
    } else {
        fail('серию и номер ВУ');
    }

    if (!empty(trim($_POST['phone']))) {
        $phone = trim(addslashes($_POST['phone']));
    } else {
        fail('номер телефона');
    }
    require('connect_bd.php');
    $sql = "INSERT INTO users (Имя, Фамилия, Отчество, ВУ, Номер_телефона,Хэш)
    VALUES
    ('$name','$surname','$sursurname','$licence','$phone','$hash')";
    mysqli_query($dbc,$sql);
    session_start();
    setcookie('Licence',$licence);
    header('Location: index.php');

}
