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

function insertinto($conn, $game, $players, $time, $teacher ){
     $query = $conn->prepare("INSERT INTO `planner`(spelers, starttijd, instructeur,naamspel)VALUES (:deelnemers, :tijd, :leraar, :game)");
   $query->execute([":deelnemers"=>$players, ":tijd"=>$time, ":leraar"=>$teacher, ":game"=>$game]);
    $message = "toevoegen gelukt!";
    echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
}

function update($conn, $game, $players, $time, $teacher ,$id){
    $query = $conn->prepare("UPDATE `planner` SET spelers = :deelnemers, starttijd = :tijd, instructeur = :leraar ,naamspel = :game WHERE id = :id");
    $query->execute([":deelnemers"=>$players, ":tijd"=>$time, ":leraar"=>$teacher, ":game"=>$game,":id"=>$id]);
    $message = "Aanpassen gelukt!";
    echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
}

?>

