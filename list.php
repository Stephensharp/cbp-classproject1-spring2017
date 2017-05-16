<?php

// "boostrap" the application
require 'bootstrap.php';

// retrieve all notes from database
$notes = database_please_get_all_notes();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of notes</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>

    <?php include 'nav.php'; ?>

    <h1>List of notes</h1>
    
    <!-- display the retrieved notes -->
    <ul>

        <?php foreach($notes as $note) : ?>

            <li>
                <?php echo $note->title; ?>
                <a href="<?php echo $note->getDetailUrl(); ?>">detail</a>
                <a href="<?php echo $note->getEditUrl(); ?>">edit</a>
            </li>

        <?php endforeach; ?>

    </ul>

</body>
</html>