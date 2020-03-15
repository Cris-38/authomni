<?php

require 'db.php';
require 'authcontroller.php';

$meal_package = isset($_GET['meal_package']) ? $_GET['meal_package'] : 0;
$newsleter = isset($_GET['newsleter']);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">


    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>

    <title>Omnifood</title>

  </head>
  <body>
    <a class="none" href="index.php"><img class="logo-mail" src="resources/img/logo.png"></a>
    <div>
  <section id="register" class="section-form">
    <div class="row">
    <h2>Sign up</h2>
    </div>
<div class="row">
  <form action="authcontroller.php" method="post" class="contact-form">
    <div class="row">

      <div class="col span-1-of-3">
          <label for="meal_package">package</label>
      </div>

      <div class="col span-2-of-3">
        <select name="meal_package">
            <option <?php  if($meal_package == 1) echo 'selected';?> value="premium-package">premium-package</option>
            <option <?php  if($meal_package == 2) echo 'selected';?> value="pro-package">pro-package</option>
            <option <?php  if($meal_package == 3) echo 'selected';?> value="starter-package">starter-package</option>

        </select>

      </div>
    </div>
    <div class="row">
      <div class="col span-1-of-3">
      <label for="user_name">username</label>
      </div>
      <div class="col span-2-of-3">
      <input type="text" name="user_name" placeholder="username" id="name" required>
      </div>
    </div>
    <div class="row">
      <div class="col span-1-of-3">
      <label for="email">email</label>
      </div>
      <div class="col span-2-of-3">
      <input type="email" name="email" id="email" placeholder="email"required>
      </div>
    </div>
    <!--
    <div class="row">
      <div class="col span-1-of-3">
      <label for="password">password</label>
      </div>
      <div class="col span-2-of-3">
      <input type="text" name="password" placeholder="password" required>
      </div>
    </div>
    <div class="row">
      <div class="col span-1-of-3">
      <label for="password2">Reenter password</label>
      </div>
      <div class="col span-2-of-3">
      <input type="text" name="password2" placeholder="reenter password" required>
      </div>
    </div>
  -->
    <div class="row">
   <div class="col span-1-of-3">
   <label>Newsletter?</label>
   </div>
   <div class="col span-2-of-3">
   <input class="move-left" type="checkbox" name="newsleter" id="news" checked>Yes, please
   </div>
   </div>
    <div class="row">
      <div class="col span-1-of-3">
      <label>&nbsp;</label>
      </div>
      <div  class="col span-2-of-3 btn-sub">
      <input type="submit" name="singin-btn">
    </div>
    </div>
  </form>
</div>
</section><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js" integrity="sha256-g6iAfvZp+nDQ2TdTR/VVKJf3bGro4ub5fvWSWVRi2NE=" crossorigin="anonymous"></script>

<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.2/waypoints.min.js"></script>
<script src="resources/js/script.js"></script>
</div>
<div class="flex-wrapper">
<?php include 'footer.php'; ?>
</div>
</body>
</html>
