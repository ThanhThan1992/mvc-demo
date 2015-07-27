<?php
$config = @simplexml_load_file('config.xml');
//$config=simplexml_load_file('config.xml');
//var_dump($config); die;
if (!$config) die('Not connect to database');
function connectToDatabase(){
    global $config;
    $host=$config->database->host;
    $port=$config->database->port;
    $db_name=$config->database->db_name;
    $username=$config->database->username;
    $password=$config->database->password;
    $conn = pg_connect("host=$host port=$port dbname=$db_name user=$username password=$password"); 
    return $conn;
}
 ?>

