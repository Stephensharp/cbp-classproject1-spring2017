<?php

/**
 * retrieves and returns one note based on it's id
 *
 * if the note is not found, returns null
 * @param integer $note_id - id of the note to retrieve
 * @return object(note) - the retrived note or null
 */
function mysql_please_get_note($note_id)
{
    include 'config.php'; // includes $secret_password
    
    // 1. connect to the database
    // 'mysql:dbname=database_name;host=localhost;charset=utf8'
    try {
        $pdo = new PDO(
            'mysql:dbname=notes;host=localhost;charset=utf8',
            'root',
            $secret_password
        );
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    // 2. write the query

    // 3. execute the query and get the result

    // 4. return the result
}