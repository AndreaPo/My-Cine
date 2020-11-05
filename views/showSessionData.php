<?php
$user = unserialize($_COOKIE['user']);
if (isset($_SESSION['title'])) {
    echo "<div class='card border-primary shadow-lg p-3 mb-5'><h1 class='card-title'>" . $_SESSION['title'] . "<h1><h3> Genre: " . $_SESSION['genre'] ."</h3><h3> Year: " . $_SESSION['year'] . "</h3>";
    echo "<img src='" . $_SESSION['poster'] . "' class='card-img-top'>"; 
    echo "<h4 class='text-muted'>". $_SESSION['plot'] . "</h4>";
    echo "<h5>Director: " . $_SESSION['director'] ."</h5>";
    echo "<h5>Actors: ". $_SESSION['actors'] . "</h5>";

    ?>
    
    
    
    <form action="/mycine/core/database/voteFilm.php" method="POST">
    <div class="form-group">
    <input type="hidden" name="title" class="form-control" value="<?= $_SESSION['title'] ?>">
    <input type="hidden" name="token" class="form-control" value="<?= $user['jwt'] ?>">
    <input type="hidden" name="country" class="form-control" value="<?= $user['country'] ?>">
    <input type="range"  name="vote" min="0" max="10" class="form-control"required>
    <input type="submit" name="submit" value="vote" class="btn btn-outline-success btn-block">
    </div>
    </form></div>
    <?php
         
          
  }else{

    echo"<h2>Use the field to search films!</h2>";
  }

  