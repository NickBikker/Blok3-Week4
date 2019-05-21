<?php
/**
 * Created by PhpStorm.
 * User: nickb
 * Date: 5/7/2019
 * Time: 10:00
 */ ?>

<?php include "navbar.php" ?>
<?php require "datalayer.php";
$id=$_GET["id"];
$result = GetPlanning($id, $conn);
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["bevestig"] == "ja") {
        $query = $conn->prepare("DELETE FROM `planner` WHERE id = :id");
        $query->execute([":id" => $id]);
        $message = "Verwijderen gelukt!";
        echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
    } else if ($_POST["bevestig"] == "nee") {
        header("location: index.php");
    }
}

$resultgame = GetGame($result["naamspel"], $conn);
?>


<div id="formplanner">
    <p><i class="fas fa-dice"></i> Spel: <?php echo $resultgame['name']; ?></p>
    <p><i class="fas fa-clock"></i> Starttijd: <?php echo $result['starttijd']; ?></p>
    <p><i class="fas fa-users"></i> Spelers: <?php echo $result['spelers']; ?></p>
    <p><i class="fas fa-user-graduate"></i> Uitlegger: <?php echo $result['instructeur']; ?></p>
    <form method="post" action="delete.php?id=<?php echo $result["id"]?>">
        <input name="bevestig" value="ja" type="submit">
        <input name="bevestig" value="nee" type="submit">
    </form>
</div>
</body>
</html>

