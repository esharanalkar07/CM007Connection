<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','cm007');
define('rootdir','/cfass');
$db=mysqli_connect(dbhost,dbuser,dbpass,dbname);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

session_start();



?>
