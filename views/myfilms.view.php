<?php   
session_start();
$uri  = '/mycine';
$user = unserialize($_COOKIE['user']);
$host = $_SERVER['HTTP_HOST'];



      if(!isset($user['nickname'])){
          
          echo "<div class='row'><h2>Please Login First!</h2></div><div class='row'><h3>In a few seconds you will be redirected to the login page.</h3></div>";

          require __DIR__ . "./../core/database/goTo.php";

          goAt($host, $uri, 4);
      }else{
        


        
        

        //titles
        echo "<div class='row'><div class='col'><div class='alert alert-primary shadow p-3 mb-5' role='alert'><h2 class='alert-heading'><form action='/mycine/core/database/logout.php' method='POST'><div class='form-group'><input type='submit' class='btn btn-danger' name='submit' value='Log out'></div></form><span class='badge badge-light'>" . strtoupper($user['nickname']) . "</span>Welcome to MYCINE!</h2><hr>";
        echo "<h4>Here you can search for any movie description and vote them!</h4></div></div>";
        
        require __DIR__ . "./../core/database/statsFilms.php";
        require __DIR__ . "./../core/database/countFilm.php";
        
        //stats
        echo "<div class='col'><div class='alert alert-primary shadow p-3 mb-5'><h4>Quick Facts</h4><h6>You voted <span class='badge badge-light'><h6>". $_SESSION['countfilm'] . "</h6></span> films!</h6><hr>";
        echo "<h6><span class='badge badge-light'><h6>". $_SESSION['bestfilm'] . "</h6></span> is now your favorite film!</h4><hr>";
        echo "<h6><span class='badge badge-light'><h6>". $_SESSION['worstfilm'] . "</h6></span> is the film you never see again!</h6></div></div></div>";?>
       
        <div class='row'>
        <div class="col-2"></div>
          <div class="col-8">
          <!-- form tot search film -->
          <form action="/mycine/core/database/selectFilm.php" method="POST">
          <div class="form-group">
          <input type="text" name="film" class="form-control" placeholder="Search title" required>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="search" >
          </div>
          </form>
          </div>
          
          <div class="col-2"></div>
        </div>
        <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
           
           <?php 
           //show api film result 
           require "showSessionData.php";
           ?>
          </div>
          <div class="col-4"></div>
          </div>
        
        
        <?php
        echo"<div class='row'>
        <table class='table table-hover table-dark'>
        <thead>
        <tr><h2>Your movies</h2></tr>
        </thead>
        <tbody>";
        //films searched table
        require __DIR__ . "./../core/database/filmsvoted.php";

        echo"</tbody></table>";?>
        
        

<?php }
echo "<div class='col'></div></div>";


