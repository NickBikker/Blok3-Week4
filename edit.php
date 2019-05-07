<?php
/**
 * Created by PhpStorm.
 * User: nickb
 * Date: 5/6/2019
 * Time: 11:30 AM
 */

?>
<?php include "navbar.php" ?>
<?php require "datalayer.php";
$id=$_GET["id"];
$result = GetPlanning($id, $conn);
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $query = $conn->prepare("UPDATE `planner` SET spelers = :deelnemers, starttijd = :tijd, instructeur = :leraar ,naamspel = :game WHERE id = :id");
   $query->execute([":deelnemers"=>$_POST["plandeelnemers"], ":tijd"=>$_POST["plantijd"], ":leraar"=>$_POST["planleraar"], ":game"=>$_POST["game"],":id"=>$id]);
    $message = "Aanpassen gelukt!";
    echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
}
?>


<div id="formplanner">
    <form action="edit.php?id=<?php echo $result["id"]?>" method="post">
        <fieldset>
            <legend>Inplannen games</legend>
            <input type="text" name="game" value="<?php echo $result["naamspel"] ?>"><br>
            <input name="plantijd" type="time" value="<?php echo $result["starttijd"] ?>"><br>
            <input name="plandeelnemers" placeholder="Typ je deelnemers hier hier" value="<?php echo $result["spelers"] ?>"><br>
            <input name="planleraar" placeholder="Typ je leraar hier" value="<?php echo $result["instructeur"] ?>"><br>
            <input type="submit">

        </fieldset>
    </form>
</div>
</body>
</html>



