<?php

if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) && isset( $_POST['senha'] ) && ! empty( $_POST['senha'] ) ) {

    require 'config.php';
    require '/classes/User.class.php';

    $user = new User();
    
    $email = addslashes( $_POST['email'] );
    $pass = addslashes( $_POST['pass'] );

    
    if ( $user->login( $email, $pass ) == true ) {

        if ( isset( $_SESSION['idUser'] ) ) {

            header("Location: ../index.html");

        } else {

            header("Location: ../login.php");

        }

    }  else {

        header("Location: ../login.php");

    }

} else {

    header("Location: ../login.php");

}