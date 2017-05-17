<?php

// db library
class db
{
    // connection to DB
    protected static $pdo = null;

    // purpose: get PDO object
    protected static function getPDO()
    {
        if(static::$pdo === null)
        {
            include 'config.php'; // includes $secret_password
            
            // 1. connect to the database
            // 'mysql:dbname=database_name;host=localhost;charset=utf8'
            try 
            {
                $pdo = new PDO(
                    'mysql:dbname=notes;host=localhost;charset=utf8',
                    'root',
                    $secret_password
                );
            } 
            catch (PDOException $e) 
            {
                echo 'Connection failed: ' . $e->getMessage();
            }

            // put the created PDO connection into static property
            static::$pdo = $pdo;
        }

        return static::$pdo;
    }

    /**
    * retrieves and returns one note based on it's id
    *
    * if the note is not found, returns null
    * @param integer $note_id - id of the note to retrieve
    * @return object(note) - the retrived note or null
    */
    public static function get_note($note_id)
    {
        $pdo = static::getPDO();

        // 2. write the query
        $query = "
            SELECT *
            FROM `notes`
            WHERE `id` = ?
        ";

        // 3. write the query
        $statement = $pdo->prepare($query);

        // 4. execute the query and get the result
        $statement->execute([$note_id]);

        // makes any fetching fetch objects
        // $statement->setFetchMode(PDO::FETCH_OBJ);

        $statement->setFetchMode(PDO::FETCH_CLASS, 'note');

        // 5. return the result
        return $statement->fetch();
    }

    public static function get_all_notes()
    {
        $pdo = static::getPDO();

        // 2. write the query
        $query = "
            SELECT *
            FROM `notes`
        ";

        // 3. write the query
        $statement = $pdo->prepare($query);

        // 4. execute the query and get the result
        $statement->execute([$note_id]);

        $statement->setFetchMode(PDO::FETCH_CLASS, 'note');

        // 5. return the result
        return $statement->fetchAll();
    }

    public static function delete_note($note_id)
    {
        // 2. write the query
        $query = "
            DELETE
            FROM `notes`
            WHERE `id` = ?
        ";

        // 3. write the query
        $statement = static::getPDO()->prepare($query);

        // 4. execute the query and get the result
        $statement->execute([$note_id]);
    }
}