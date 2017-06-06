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

    <div class="page-content note-detail">

        <h1><?php echo $note->getTitle(); ?></h1>

        <div class="date">
            Created: <?php echo $note->getCreatedAt('F j, G:i'); ?>
        </div>
        <div class="date">
            Updated: <?php echo $note->getUpdatedAt('F j, G:i'); ?>
        </div>

        <div class="text">
            <?php echo $note->getFormattedText(); ?>
        </div>
    
    </div>

</body>
</html>