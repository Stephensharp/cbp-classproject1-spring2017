<?php

// "boostrap" the application
require 'bootstrap.php';

// class for retrieving data from database (extends class db)
require_once 'api-db.php';

// retrieve all notes from database
// skip 0, select 10, order by `created_at` in ascending order
$notes = api_db::getNotes();

var_dump($notes);

// skip 1, select 1, ordere by `title` in ascending order
$notes = api_db::getNotes(1, 1, 'title', 'desc');

var_dump($notes);