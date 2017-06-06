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
    $note = db::get_note($_GET['id']);
    var_dump($note);
    if(!$note) { // the note should have been retrieved
        // if it wasn't retrived, something went wrong - the note does not exist
        // in that case: error 404, page not found
        header("HTTP/1.0 404 Not Found");
    }

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
    $note->setTitle($note_array['title']);
    $note->setText($note_array['text']);

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
        if(!$note->id) // if the note has not been saved yet
        {
            // update the created_at datetime
            $note->created_at = date('Y-m-d H:i:s');
        }
        // always: update the updated_at datetime
        $note->updated_at = date('Y-m-d H:i:s');

        // SAVE UPDATED DATA
        $saved_note_id = database_please_save_note($note);
        
        // update the $note object with the id so now it looks like
        // a saved note
        $note->id = $saved_note_id;

        // REDIRECT (to editing of this note)
        header('Location: '.$note->getEditUrl());
        exit(); // end the script after redirection (should not be necessary)
    }
}

if(strlen($note->title) < 10)
{
    $messages[] = 'WARNING: The title is too short';
}

$title = 'Edit note form';
?>
<?php include 'header.php'; ?>

    <?php include 'nav.php'; ?>

    <?php if($note->id) : ?> <!-- display link to detail only for saved notes -->
        <nav class="left">
            <a href="<?php echo $note->getDetailUrl(); ?>">view this note</a>
        </nav>
    <?php endif; ?>
    
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