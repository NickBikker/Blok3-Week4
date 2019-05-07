<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "gameplanner";
date_default_timezone_set("Europe/Amsterdam");

try {
    $conn = new PDO("mysql:host=$servername;dbname=".$database, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

function GetallGames($conn){
    $query = $conn->prepare('SELECT*FROM games');
    $query->execute();
    $result = $query->fetchall();
    return $result;
}

function GetGame($id,$conn){
    $query = $conn->prepare('SELECT*FROM games where id=:id');
    $query->execute([":id"=>$id]);
    $result = $query->fetch();
    return $result;
}

function GetFullPlanning($conn){
    $query = $conn->prepare('SELECT*FROM planner ORDER BY starttijd ASC');
    $query->execute();
    $result = $query->fetchall();
    return $result;
}

function GetPlanning($id,$conn){
    $query = $conn->prepare('SELECT*FROM planner where id=:id');
    $query->execute([":id"=>$id]);
    $result = $query->fetch();
    return $result;
}

?>

