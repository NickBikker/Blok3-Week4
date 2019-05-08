<?php
/**
 * Created by PhpStorm.
 * User: nickb
 * Date: 5/6/2019
 * Time: 11:30 AM
 */

?>
<?php include "navbar.php" ?>
<?php require "datalayer.php" ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $query = $conn->prepare("INSERT INTO `planner`(spelers, starttijd, instructeur,naamspel)VALUES (:deelnemers, :tijd, :leraar, :game)");
   $query->execute([":deelnemers"=>$_POST["plandeelnemers"], ":tijd"=>$_POST["plantijd"], ":leraar"=>$_POST["planleraar"], ":game"=>$_POST["game"]]);
    $message = "toevoegen gelukt!";
    echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
}
?>







<div id="formplanner">
    <form action="form.php" method="post">
        <fieldset>
            <legend>Inplannen games</legend>
            <select name="game">
                <?php
                $result = GetallGames($conn);
                foreach($result as $resultaat){
                    echo "<option value='".$resultaat['id']."'> ".$resultaat['name']." </option>";
                }
                ?>
            </select><br>
            <input name="plantijd" type="time"><br>
            <input name="plandeelnemers" placeholder="Typ je deelnemers hier hier"><br>
            <input name="planleraar" placeholder="Typ je leraar hier"><br>
            <input type="submit">

        </fieldset>
    </form>
</div>
</body>
</html>



