<?php

// bootstrap the application
require 'bootstrap.php';

// retrieve the note from database
$note = database_please_get_note($_GET['id']);


$title = 'Detail of a note';
?>
<?php include 'header.php'; ?>

    <?php include 'nav.php'; ?>
    
    <nav class="left">
        <a href="<?php echo $note->getEditUrl(); ?>">edit this note</a>
        <a href="delete.php?id=<?php echo $note->id; ?>" 
            onclick="if(!confirm('Do you really want to delete this?')) { return false; }">delete this note</a>
    </nav>

    <h1><?php echo $note->title; ?></h1>

    <?php echo $note->text; ?>
    
</body>
</html>