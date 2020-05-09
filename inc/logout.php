<?php

session_start();

unset( $_SESSION['idUser'] );

$_SESSION['loginMessage'] = 'Esperamos você em breve. Até logo!';

header( "Location: ../login.php" );