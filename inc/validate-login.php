<?php

if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) && isset( $_POST['pass'] ) && ! empty( $_POST['pass'] ) ) {

    require 'config.php';
    require 'classes/User.class.php';

    $user = new User();
    
    $email = addslashes( $_POST['email'] );
    $pass = addslashes( $_POST['pass'] );
    
    if ( $user->login( $email, $pass ) == true ) {

        if ( isset( $_SESSION['idUser'] ) ) {

            header("Location: ../admin.php");

        } else {
            
            $_SESSION['loginMessage'] = 'Não foi possível realizar seu login, por favor entre em contato com a equipe técnica do site.';
            header("Location: ../login.php");

        }

    }  else {
        
        $_SESSION['loginMessage'] = 'E-mail e/ou senha inválidos!';
        header("Location: ../login.php");

    }

} else {

    $_SESSION['loginMessage'] = 'E-mail e/ou senha inválidos!!';
    header("Location: ../login.php");

}