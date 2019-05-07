<?php include "navbar.php" ?>
<div class="grid">
<?php require "datalayer.php"?>
    <?php $result=GetallGames($conn);
    foreach ($result as $row){?>
          <a href="smikkel.php?id=<?php echo $row['id']; ?>">
              <div class="info">
              <img class="Foto" src="img/<?php echo $row['image']; ?>">
              <p class="naamgame"><?php echo $row['name']?></p>
      </div>
        </a>
    <?php }?>
</div>
</body>
</html>