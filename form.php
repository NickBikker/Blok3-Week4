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
  insertinto($conn, $_POST["game"], $_POST["plandeelnemers"], $_POST["plantijd"], $_POST["planleraar"]);

}
?>


<div id="formplanner">
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
            <input name="plantijd" type="time" value="<?php echo $_POST["plantijd"] ?>">
            <span class="error">* <?php echo $error["plantijd"];?></span><br>
            <input name="plandeelnemers" placeholder="Typ je deelnemers hier hier" value="<?php echo $_POST["plandeelnemers"] ?>">
            <span class="error">* <?php echo $error["plandeelnemers"];?></span><br>
            <input name="planleraar" placeholder="Typ je leraar hier" value="<?php echo $_POST["planleraar"] ?>">
            <span class="error">* <?php echo $error["planleraar"];?></span><br>
            <input type="submit">

        </fieldset>
    </form>
</div>
</body>
</html>



