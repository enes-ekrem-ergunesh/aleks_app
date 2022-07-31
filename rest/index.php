<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once __DIR__.'/dao/NoteDao.class.php';

Flight::register('noteDao', 'NoteDao');

require_once __DIR__.'/routes/NoteRoutes.php';

Flight::start();

?>
