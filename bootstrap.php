<?php

// activate error reporting (for debugging)
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// basic definitions for the database functions
define('DATA_DIR', 'data');
define('NOTE_CLASS', 'note');
define('PRIMARY_KEY', 'id');
define('INDEX_DATA', ['title']);

// require all necessary libraries
require('database.php');    // functions to access database
require('mysql-database.php'); // functions to access MySQL database
require('html_helper.php'); // functions to generate HTML

/* 
available functions:
-------------------

// database_please_get_index()
// database_please_get_all_notes()
// database_please_get_note($note_id)
// database_please_save_note($note_object)
// database_please_delete_note($pk)
*/

// declare necessary classes
class note
{
    public $id = null;
    public $title = null;
    public $text = null;
    public $category = null;
    public $created_at = null;
    public $updated_at = null;

    public function getEditUrl()
    {
        // form.php?id=1
        return 'form.php?id=' . $this->id;
    }

    public function getDetailUrl()
    {
        // detail.php?id=1
        return 'detail.php?id=' . $this->id;
    }

    /**
     * retrieve the value of $this->title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * set the value of $this->title
     */
    public function setTitle($value)
    {
        $this->title = trim($value);
    }

    /**
     * retrieve the value of $this->text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * set the value of $this->text
     */
    public function setText($value)
    {
        $this->text = $value;
    }

    /**
     * retrieve the value of $this->created_at
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        // translate datetime to timestamp and 
        // timestamp to datetime in specified format
        return date($format, strtotime($this->created_at));
    }

    /**
     * retrieve the value of $this->updated_at
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        return date($format, strtotime($this->updated_at));
    }

    /**
     * returns $this->text but formatted so that newlines
     * and HTML code are preserved
     */
    public function getFormattedText()
    {
        $text = $this->text;

        // format the copy
        // ...

        // preserve HTML
        $text = htmlspecialchars($text);

        $text = nl2br($text);

        return $text;
    }
}