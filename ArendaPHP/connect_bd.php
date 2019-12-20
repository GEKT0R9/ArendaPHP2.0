<?php
    $dbc= mysqli_connect('localhost','root','','arenda')
        OR die(mysqli_connect_error());
    mysqli_set_charset($dbc,'utf-8');