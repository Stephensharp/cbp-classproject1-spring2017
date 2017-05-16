<?php

// "boostrap" the application
require 'bootstrap.php';

// --------------------------

// get the id of the note from URL
$note_id = $_GET['id'];

// delete the note
database_please_delete_note($note_id);

// --------------------------

// redirect to list of notes
header('Location: list.php');