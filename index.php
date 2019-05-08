<?php
/**
 * Created by PhpStorm.
 * User: nickb
 * Date: 5/7/2019
 * Time: 9:34
 */ ?>

<?php include "navbar.php"?>
<?php require "datalayer.php"?>
<?php
$wholeplanning = GetFullPlanning($conn);
?>
<div class="indexdiv">
<?php
foreach($wholeplanning as $result){
    $spel = GetGame($result["naamspel"], $conn);
    ?>
    <div id="plancontainer">
        <h4><i class="fas fa-chess"></i><?php echo $spel["name"]?></h4>
        <h4><i class="far fa-clock"></i><?php echo $result["starttijd"]?></h4>
        <h4><i class="fas fa-users"></i><?php echo $result["spelers"]?></h4>
        <h4><i class="fas fa-graduation-cap"></i><?php echo $result["instructeur"]?></h4>
        <a href="edit.php?id=<?php echo $result["id"] ?>"><i class="fas fa-edit"></i>Edit</a>
        <a href="delete.php?id=<?php echo $result["id"] ?>"><i class="fas fa-trash"></i>Delete</a>
    </div>
<?php
}
?>
</div>
