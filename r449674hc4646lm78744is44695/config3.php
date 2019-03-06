<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '1111');
define('DATABASE', 'rhclmis_dbs');

class DB {
    function __construct(){
        $connection = @mysql_connect(SERVER, USERNAME, PASSWORD) or die('Connection error -> ' . mysql_error());
        mysql_select_db(DATABASE, $connection) or die('Database error -> ' . mysql_error());
    }
}
?>