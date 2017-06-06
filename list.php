<?php

// "boostrap" the application
require 'bootstrap.php';

// retrieve all notes from database
$notes = db::get_all_notes();

$title = 'List of notes';

// include HTML header (ends with <body>)
include 'header.php'; ?>

    <?php include 'nav.php'; ?>

    <h1>List of notes</h1>
    
    <!-- display the retrieved notes -->
    <ul>

        <?php foreach($notes as $note) : ?>

            <li>
                <?php echo $note->getTitle(); ?>
                <a href="<?php echo $note->getDetailUrl(); ?>">detail</a>
                <a href="<?php echo $note->getEditUrl(); ?>">edit</a>
            </li>

        <?php endforeach; ?>

        <li>
            <a href="form.php">create new note</a>
        </li>

    </ul>

</body>
</html>