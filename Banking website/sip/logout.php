<?php

// session_start();: This function is called to initialize a new or existing session.
session_start();

// $_SESSION = array();: This line clears all the session data by setting the $_SESSION superglobal to an empty array.
$_SESSION = array();

// session_destroy();: This function destroys the current session. It removes all session data from the server, and the session ID is no longer valid.
session_destroy();

// header("location: login.php");: This line redirects the user to the login.php page after the session has been destroyed.
header("location: login.php");

?>