<?php

$server = 'localhost';

$username = 'root';

$password = 'example';

$dbname = 'shop';

function connect_db(): mysqli
{
    global $server, $username, $password, $dbname;
    $conn = new mysqli($server, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
