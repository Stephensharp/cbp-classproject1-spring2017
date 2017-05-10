<?php

// activate error reporting (for debugging)
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// basic definitions for the database functions
define('DATA_DIR', 'data');
define('NOTE_CLASS', 'note');
define('PRIMARY_KEY', 'id');
define('INDEX_DATA', ['title']);

require('database.php');

/* 
available functions:
-------------------

// database_please_get_index()
// database_please_get_all_notes()
// database_please_get_note($note_id)
// database_please_save_note($note_object)
// database_please_delete_note($pk)
*/

class note
{
    public $id = null;
    public $title = null;
    public $text = null;
    public $created_at = null;
    public $updated_at = null;
}

$messages = []; // messages to be displayed to the user

// RETRIEVE DATA FROM DB OR INITIALIZE EMPTY DATA
$note = new note();

// IF FORM WAS SUBMITTED
if($_POST)
// if($_SERVER['REQUEST_METHOD'] == 'POST') // also possible
{
    // GET THE SUBMITTED DATA
    // get everyting that starts with note[] from POST
    $note_array = $_POST['note'];

    // UPDATE THE RETRIEVED DATA WITH SUBMITTED DATA
    $note->title = $note_array['title'];
    $note->text = $note_array['text'];

    // IS THE UPDATED DATA VALID?
    $valid = true; // assume that everything is fine
    if(strlen($note->title) == 0)
    {
        $messages[] = 'The title must not be empty';
        $valid = false; // switch the valid status to false
    }

    if($valid) // is the status still valid (ie. no validation conditions failed)
    {
        // update the dates
        $note->created_at = date('Y-m-d H:i:s');
        $note->updated_at = date('Y-m-d H:i:s');

        // SAVE UPDATED DATA
        database_please_save_note($note);

        // REDIRECT
        header('Location: form.php');
        exit(); // end the script after redirection (should not be necessary)
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <h1>The form</h1>

    <?php if($messages) : ?>
        <?php foreach($messages as $message) : ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="" method="post">

        <label for="note_title">Title</label><br>
        <input type="text" name="note[title]" value="<?php echo htmlspecialchars($note->title); ?>" id="note_title"><br>
        <br>
        <label for="note_text">Text</label><br>
        <textarea name="note[text]" id="note_text"><?php echo htmlspecialchars($note->text); ?></textarea><br>
        <br>
        <input type="submit" value="Save" name="submit">

    </form>

</body>
</html>