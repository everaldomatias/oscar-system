<?php

class User {

    public function login( $login, $password ) {

        global $pdo;

        $sql = "SELECT * FROM users WHERE email = :email AND pass = :pass";
        $sql = $pdo->prepare( $sql );
        $sql->bindValue( "email", $email );
        $sql->bindValue( "pass", md5( $pass ) );
        $sql->execute();

        if ( $sql->rowCount() > 0 ) {

            $data = $sql->fetch();

            $_SESSION['idUser'] = $data['id'];

            return true;

        } else {

            return false;

        }

    }

}