<html>
<head>
    <title>All games</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Gameplanning</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Toevoegen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Aanpassen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Verwijderen</a>
            </li>
        </ul>
    </div>
</nav>
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