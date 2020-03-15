<?php

require 'db.php';

if (isset($_GET['token'])){

  $token = $db->real_escape_string($_GET['token']);

  $query = "SELECT * FROM users WHERE token = '" . $token . "'";
  $result = $db->query($query);

  while ($row = $result->fetch_assoc()) {

      echo '<a class="none" href="index.php"><img class="logo-mail" src="resources/img/logo.png"></a>';

      echo '<br><br><br><br><br><br><h2>Hello ' . $row['user_name'] . '</h2>,<br><br>' . '<div align="center">You have chosing the ' . $row['meal_package'] . ' for &euro; ' .
      number_format($row['price'], 2, ',', '.') . '.<br><br> You can pay derectly with Paypal or send the payment privately.</div><br><br>';

      if ($row['newsleter'] == 1){
        echo '<div align="center">You have chosen for a weekly newsletter, every week you get a mail with news about us and new meals exetera.</div> <br><br>';

      }

      $query = "UPDATE users SET verified = 1 WHERE id =" . $row['id'];
      $db->query($query);

  }

}

echo '<div align="center">Thank you for subscribing.</div><br><br>';
?>

<html>
<body class="body">
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
    <div class="container" align="center">
    <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" border="0" alt="PayPal Logo"></a></td></tr></table>
  </di>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js" integrity="sha256-g6iAfvZp+nDQ2TdTR/VVKJf3bGro4ub5fvWSWVRi2NE=" crossorigin="anonymous"></script>

<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.2/waypoints.min.js"></script>
<script src="resources/js/script.js"></script>
</div>
<div class="paypal">
<?php include 'footer.php'; ?>
</div>
</body>
</html>
