<?php
    defined('SOME_PATH') or die('Unauthorized access');
    $configuration = array (
  'common' => 
  array (
    'livesite' => '',
    'language' => 'fi_FI',
    'secret' => 'safsf543fyg43hydrth',
    'template' => 'default',
  ),
  'session' => 
  array (
    'lifetime' => '45',
    'session_handler' => 'file',
    'session_table' => 'somesession',
  ),
  'database' => 
  array (
    'databasedriver' => 'pdopostgres',
    'databasehost' => 'localhost',
    'database' => 'note_manager',
    'dbuser' => 'postgres',
    'dbpass' => 'pass',
  ),
  'debug' => 
  array (
    'debug' => '0',
    'debugfile' => 'debug.log',
  ),
);
