<?php

class User {

    public function login( $email, $pass ) {

        global $pdo;

        $sql = "SELECT * FROM users WHERE email = :email AND pass = :pass";
        $sql = $pdo->prepare( $sql );
        $sql->bindValue( "email", $email );
        $sql->bindValue( "pass", md5( $pass ) );
        $sql->execute();

        if ( $sql->rowCount() > 0 ) {

            $data = $sql->fetch();

            $_SESSION['idUser'] = $data['id'];
            $_SESSION['nameUser'] = $data['short_name'];

            return true;

        } else {

            return false;

        }

    }

}