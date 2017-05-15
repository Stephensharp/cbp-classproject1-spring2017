<?php

// "boostrap" the application
require 'bootstrap.php';

// -------------------------------------------
// end of preparation of project & environment
// -------------------------------------------

$note_categories = [
    'html' => 'HTML', 
    'css' => 'CSS', 
    'javascript' => 'JavaScript', 
    'php' => 'PHP',
    'git' => 'Git'
];

$messages = []; // messages to be displayed to the user

// RETRIEVE DATA FROM DB OR INITIALIZE EMPTY DATA

// if there was id in GET parameters
if( !empty($_GET['id']) ) { // if( isset($_GET['id']) && $_GET['id'] ) {
    // retrieve existing note
    $note = database_please_get_note($_GET['id']);
    if(!$note) { // the note should have been retrieved
        // if it wasn't retrived, something went wrong - the note does not exist
        // in that case: error 404, page not found
        header("HTTP/1.0 404 Not Found");
    }
    var_dump($note);
} else {
    // create new note
    $note = new note();
}

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

if(strlen($note->title) < 10)
{
    $messages[] = 'WARNING: The title is too short';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav>
        <a href="<?php echo $note->getDetailUrl(); ?>">view this note</a>
        <a href="list.php">list of notes</a>
    </nav>
    
    <h1>The form</h1>

    <?php if($messages) : // if the array of messages is not empty ?>
        <div class="messages">
            <?php foreach($messages as $message) : // loop through messages ?>

                <div class="message">
                    <?php echo $message; // print each message ?>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">

        <label for="note_title">Title</label><br>
        <?php echo text_input('note[title]', $note->title, ['id' => 'note_title']); ?><br>
        <br>

        <label for="note_text">Text</label><br>
        <?php echo textarea('note[text]', $note->text, ['id' => 'note_text']); ?>
        <br>

        <label>Category</label><br>
        <?php echo select('note[category]', $note_categories, $note->category); ?><br>
        <br>

        <input type="submit" value="Save" name="submit">

    </form>

</body>
</html>