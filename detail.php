<?php

// bootstrap the application
require 'bootstrap.php';

// retrieve the note from database
$note = database_please_get_note($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note detail</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

    <nav>
        <a href="<?php echo $note->getEditUrl(); ?>">edit this note</a>
        <a href="list.php">list of notes</a>
    </nav>

    <h1><?php echo $note->title; ?></h1>

    <?php echo $note->text; ?>
    
</body>
</html>