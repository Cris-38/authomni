<?php
session_start();
//session_destroy();
require 'db.php';
//require 'mail.php';

//print phpinfo();
$errors = [];
$user_name = '';
$email = '';
//$img = '<img width="100px" height="100px" src="data:image/png;base64">';

$user_name = $db->real_escape_string($user_name);
$email = $db->real_escape_string($email);

if (isset($_POST['singin-btn'])){

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $meal_package = $_POST['meal_package'];
    $newsleter = isset($_POST['newsleter']) ? 'checked' : 0;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'email is invalid.';
    }



  if (empty($user_name && $email)) {
    $errors['$user_name'] = 'username require';
    $errors['$email'] = 'email require';

  }

  $query = "SELECT * FROM users WHERE email=? LIMIT 1";
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0){
    echo "<script>alert('Email allready exists.');
                window.location='userregister.php';
                </script>";
  }

  if (count($errors) === 0) {
    $verified = false;
    $token = bin2hex(random_bytes(50));
    if ($newsleter === 'checked') {
      $newsleter = 1;
      } else {
        $newsleter = 0;
        }

    $price = 0;

    if('premium-package' === $meal_package) {
      $price = '365.57';
    } else if ('pro-package' === $meal_package){
      $price = '136.52';
    } else {
      $price = '17.41';
    }



    $query2 = "INSERT INTO users VALUES ('', '$user_name', '$email', '$meal_package', '$price', '$verified', '$token', '$newsleter')";

    if ($stmt = $db->query($query2)) {

    /*  $_SESSION['id'] = $id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['email'] = $email;
      $_SESSION['meal_package'] = $meal_package;
      $_SESSION['price'] = $price;
      $_SESSION['verified'] = $verified;
      $_SESSION['newsleter'] = $newsleter;
      $_SESSION['alert-class'] = 'alert-succes';



    /*  $query3 = "SELECT * FROM users WHERE email = $email";
      $result =  $db->query($query3);
      if  ($result->num_rows > 0) {

        while($rows = $result->fetch_assoc()) {
          $email = $row['email'];
        }*/
        $to = $email;
        $subject = "Email verification and paymaent";
        $message = "Thank you for subscribing." . "<br>" . "Dear " . $user_name . " Click on the link for account activation and paymaent." . "<br><br>" . '<a href="http://localhost/authomni/omnifood/mail.php?token=' . $token . '">link</a>';
        $headers = "From: crisada37@gmail.com" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";




        mail($to, $subject, $message, $headers);

          echo "<script>alert('Email verification has succesfull been send to your email accuont.');
                      window.location='index.php';
                      </script>";

        //header('location: index.php');
        /*  if (isset($token)) {
            $verified = 1;
          }*/

    } else {
      $errors['db_error'] = 'database error: failed to register';
    }
  }
}
?>
