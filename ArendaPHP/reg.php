<?php
echo '<title>Создание контракта</title>';
echo '<link rel="stylesheet" href="style.css">';
$page_title = 'PHP-Публикация сообщения';
echo '<div><form action="process_user.php" method="post" accept-charset="UTF-8">
<p>Имя:<input name="name" type="text"></p>
<p>Фамилия: <input name="surname" type="text"></p>
<p>Отчество: <input name="sursurname" type="text"></p>
<p>Пароль: <input name="password" type="password"></p>
<p>Серия номер ВУ: <input name="licence" type="text"></p>
<p>Номер телефона: <input name="phone" type="text"></p>
<p><input id="butt" type="submit" value="Зарегистрироваться"></p>
</form></div>';