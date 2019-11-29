<?php

/**
 * This file should only be requested when the system is not installed.
 */

include_once( "config.php" );

/**
 * Create table "settings" if not exist
 */

if ( ! $conn->query ( "DESCRIBE settings" ) ) {

	// SQL to create table "settings"
	$sql = "CREATE TABLE settings (
		installed TINYINT NOT NULL,
		date_installation TIMESTAMP NOT NULL
	)";

	if ( ! $conn->query( $sql ) === TRUE ) {
	    echo "Error creating the table: " . $conn->error;
	} else {
        // Create the setting register
        $insert = "INSERT INTO settings ( installed, date_installation ) values ( 1, now() )";
        if ( ! $conn->query( $insert ) === TRUE ) {
            echo "Error creating setting register: " . $insert . "<br>" . $conn->error;
        }
    }

}

/**
 * Create table "users" if not exist
 */

if ( ! $conn->query ( "DESCRIBE users" ) ) {

	// SQL to create table "users"
	$sql = "CREATE TABLE users (
		id INT(7) AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(50) NOT NULL,
		pass VARCHAR(255) NOT NULL,
        short_name VARCHAR(50),
		complete_name VARCHAR(50),
		last_login TIMESTAMP,
		user_since TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)";

	if ( ! $conn->query( $sql ) === TRUE ) {
	    echo "Error creating the table: " . $conn->error;
	} else {
        $select = mysqli_query( $conn, "SELECT * FROM users" );
        if ( mysqli_num_rows( $select ) == 0 ) {
            // Create the first user
            $insert = "INSERT INTO users ( email, pass, user_since ) values ( 'admin@email.com', '" . password_hash( 'rasmuslerdorf', PASSWORD_DEFAULT ) . "', now() )";
            if ( ! $conn->query( $insert ) === TRUE ) {
                echo "Error creating the first user: " . $insert . "<br>" . $conn->error;
            }
        }        
    }

}
