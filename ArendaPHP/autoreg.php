<?php
echo '<link rel="stylesheet" href="style.css">';
echo '<div><form action="process_user.php" method="post">
<p>
    <label>Ваш номер телефона:<br></label>
    <input name="number" type="text" size="15" maxlength="15">
    </p>
<p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
<p>
    <input id="butt" type="submit" name="submit" value="Вход">
</p></form>
<a href="reg.php">Зарегестрироваться</a>
</div>';
