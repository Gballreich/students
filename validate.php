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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $SID = $_POST['SID'];
    $Last = $_POST['Last'];
    $First = $_POST['First'];
    $Birthdate = $_POST['Birthdate'];
    $GPA = $_POST['GPA'];
    $Advisor = $_POST['Advisor'];

    //INSERT QUERY
//step 1 - define the query
$sql = 'INSERT INTO student (SID, Last, First, Birthdate, GPA, Advisor)
        VALUES (:SID, :Last, :First, :Birthdate, :GPA, :Advisor)';
//step 2
//prepare the statement
$statement = $dbh->prepare($sql);

$statement->bindParam(':SID', $SID);
$statement->bindParam(':Last', $Last);
$statement->bindParam(':First', $First);
$statement->bindParam(':Birthdate', $Birthdate);
$statement->bindParam(':GPA', $GPA);
$statement->bindParam(':Advisor', $Advisor);

//step 4 - execute the query
$statement->execute();

//step 5 - optional
}