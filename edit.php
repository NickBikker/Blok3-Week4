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
$inputs = array("plandeelnemers","plantijd", "planleraar","game");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
    foreach($inputs as $value) {
        $data[$value] = "";
        $error[$value] = "";
        if (empty($_POST[$value])) {
            $error[$value] = "Required";
            $valid = false;
        }
        else {
            $data[$value] = test_input($_POST[$value]);
        }
    }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if($valid) {
    update($conn, $_POST["game"], $_POST["plandeelnemers"], $_POST["plantijd"], $_POST["planleraar"], $id);

}
?>

<div id="formplanner">
    <form action="edit.php?id=<?php echo $result["id"]?>" method="post">
        <fieldset>
            <legend>Inplannen games</legend>
            <select name="game">
                <?php
                $result2 = GetallGames($conn);
                foreach($result2 as $resultaat){
                    echo "<option value='".$resultaat['id']."'> ".$resultaat['name']." </option>";
                }
                ?>
            </select><br>
            <input name="plantijd" type="time" value="<?php echo $result["starttijd"] ?>">
            <span class="error">* <?php echo $error["plantijd"];?></span><br>
            <input name="plandeelnemers" placeholder="Typ je deelnemers hier hier" value="<?php echo $result["spelers"] ?>">
            <span class="error">* <?php echo $error["plandeelnemers"];?></span><br>
            <input name="planleraar" placeholder="Typ je leraar hier" value="<?php echo $result["instructeur"] ?>">
            <span class="error">* <?php echo $error["planleraar"];?></span><br>
            <input type="submit">

        </fieldset>
    </form>
</div>
</body>
</html>


