<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session', 'form_validation', 'encrypt');

$autoload['helper'] = array('url', 'date');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('user', 'book', 'review');

//end of autoload.php