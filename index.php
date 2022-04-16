<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

require 'app/Helpers/helpers.php';
require 'app/Helpers/constants.php';
require 'vendor/autoload.php';
require 'router/web.php';
