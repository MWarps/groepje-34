<?php
$hostname = 'localhost';
$dbname = 'iproject';
$username = 'iproject34';
$password = 'frSjuhb7yr';

try {
    global $dbh;

    $dbh = new PDO("sqlsrv:server=$hostname; database=$dbname;
                connectionpooling=0;", "$username", "$password");

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'verbonden';
} catch (PDOexception $e) {
    echo "something went wrong {$e->getMessage()}";
}
?>