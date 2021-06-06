<?php

$host = 'localhost';
        $dbname = 'chat';
        
        $dsn = 'mysql:host='.$host.';dbname='.$dbname;
        $user = 'root';
        $pwd = ''; 
        
        $options = array (
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    );

?>