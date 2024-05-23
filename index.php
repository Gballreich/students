<?php
ini_set('display_errors');
error_reporting(E_ALL);
//echo "demo!!!!";
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

try {
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'connected to database!';
}
catch (PDOException $e){
    die( $e->getMessage() );
}

//SELECT *

//define query
$sql = "SELECT * FROM student";

//prepare the statement
$statement = $dbh->prepare($sql);

//execute the statement
$statement->execute();

//process
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo "<ol>";
foreach($result as $row){
    echo "<li>".$row['last']. ", ".$row['first']."</li>";
}
echo "</ol>";

