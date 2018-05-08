<?php

 ob_start();
 session_start(); // start a new session or continues the previous

 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
 }

 include_once 'db_connect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain letters and spaces.";
  }

   //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {

   // check whether the email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }

  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have at least 6 characters.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(userName,userEmail,userPass,usertype) VALUES('$name','$email','$password','1')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
    }
  }
 }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login form</title>
  <link rel="stylesheet" href="">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Include the above in your HEAD tag-->

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
  " integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css
  " rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css
  " integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js
  "
    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
    crossorigin="anonymous"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js
  " integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js
  "></script>
  <style>
    body{
      background-image: url('images/image1.jpg');
      background-attachment:fixed;
      background-position: center;
      background-size: cover;
      
      background-repeat: no-repeat;

    }
    .formulario{
      
      width: 30%;
      transition: 2s;
      margin-top: 100px;
      box-shadow: 0px 0px 40px red, 0px 0px 80px white;
      border-radius: 0px 40px 0px 40px;

    }
    /*
 ########  BIRD  start ###########
 */



          *, 
          *:before,
          *:after {
            box-sizing: inherit;
          }

          #bird {
            height: 75px;
      margin-top: 40px;

            
            width: 94%;
           
            max-width: 15rem;
            text-align: center;
            line-height: 1.5;
            font-size: 1rem;
            font-family: "Helvetica Neue", Arial, sans-serif;
          }

          /**
           * Bird Styles
           */

          #bird {
            overflow: visible;
            animation-name: swoopInLeft;
            animation-duration: 1.5s;
            animation-fill-mode: both;
            animation-timing-function: cubic-bezier(.37,-.81,.89,2.04);
          }

          .wing {
            animation-name: wingFlap;
            animation-duration: 6.75s;
            animation-fill-mode: both;
            animation-delay: 1.5s;
            animation-timing-function: ease;
          }

          .eyeball {
            animation-name: eyeballBlink;
            animation-duration: 0.35s;
            animation-fill-mode: both;
            animation-delay: 2s;
            animation-timing-function: ease;
          }

          /**
           * Animation Styles
           */

          @keyframes swoopInLeft {
            0% {
              opacity: 0;
              transform: translate3d(-250px, -100px, 0) rotateZ(14deg) rotateY(60deg) scale(0.25);
            }
            
            90% {
              opacity: 1; 
            }
            
            100% {
              transform: none;
            }
          }

          @keyframes wingFlap {
            0% {
              transform: none;
            }
            
            25% {
              transform: translate3d(75px, -90px, 0) rotate(6deg);
            }
            
            50% {
              transform: none;
            }
            
            75% {
              transform: translate3d(75px, -90px, 0) rotate(6deg);
            }
            
            100% {
              transform: none;
            }
          }

          @keyframes eyeballBlink {
            0% {
              transform: none;
              transform-origin: 50% 50%;
            }
            25% {
              transform: scale(1, 0);
              transform-origin: 50% 50%;
            }
            50% {
              transform: none;
              transform-origin: 50% 50%;
            }
            75% {
              transform: scale(1, 0);
              transform-origin: 50% 50%;
            }
            100% {
              transform: none;
              transform-origin: 50% 50%;
            }
          }
/*
 ########  BIRD  ende ###########
 */

 .espaciado{
      margin-top: 40px;
    }

    h3, h4{
      color: white;
      text-align: center;
    }

    legend{
      border: none;

    }

    .Input{
      transition: .8s;
      background-color: rgba(0, 0, 0, .5);
      color: white;
      border-color:#006; 
      border-bottom-color: white; 
      border-bottom-style: groove;
      border-right: none;
      border-left: none;
      border-top: none;
      border-width: 6px;
    }
    .Input:hover{
      transition: .8s;
      background-color: rgb(55, 71, 79, .5);
      box-shadow: inset;
      border-bottom-color: red;

    }
    .Input:focus{
      transition: .8s;
      border-bottom-color: red;
    }

    @media screen and (max-width: 750px){
      .formulario{
        width: 85%;
        margin-top: 10px;

      }
      #bird{
        height: 50px;
      }

    }
    #form-group{
      margin-top: 10px;

    }



  </style>
 
</head>

<body>

  <div class="container formulario">
    
      
    
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4">
        <!--########  BIRD  start ###########-->

        <svg version="1.1" id="bird" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
            <path class="beak" fill="#F4B13B" d="M1200,196.1L994.3,400.2c0-0.1-0.1-0.3-0.1-0.3L874.6,196.1L1200,196.1L1200,196.1z"/>
            <path class="head" fill="#B53026" d="M547.1,196.1h327.1L711.2,359L547.1,196.1z"/>
            <path class="face" d="M994.3,400.2L873.5,520L711.2,359l162.9-162.9h0.4c55.8,55.9,97.3,125.7,119.7,203.6 C994.3,399.9,994.3,400,994.3,400.2z"/>
            <polygon class="tail animated bounceInLeft" fill="#B53026" points="337.2,911.6 0,573.4 0,911.6 "/>
            <path fill="#B53026" d="M1012.5,530.2c0,261.8-212.3,474-474,474c-130.4,0-248.6-52.8-334.4-138l507.3-507.3L873.5,520l120.7-120 C1006.1,441.5,1012.5,485,1012.5,530.2z"/>
            <path class="wing" fill="#D13737" d="M203.9,866.3c58,57.7,138,93.5,226.4,93.5c177.2,0,321.1-143.7,321.1-321.1c0-88.4-35.6-168.3-93.5-226.4 L703.9,866.3z"/>
            <circle class="eyeball" fill="#FFFFFF" cx="874.4" cy="285.7" r="106.7"/>
            <!-- r=eye size-->

        </svg>

<!--########  BIRD  ende ###########-->
      </div>
      
    </div>

    <div class="espaciado">
      
    </div>
      <div class="row">
        <fieldset class="col-xs-10 col-xs-offset-1">
          
          <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="form-group">
              <label class="col-xs-10" for="usuario" ><h4>Name</h4></label>
              <?php
                if ( isset($errMSG) ){
                echo $errMSG; ?>
                  <?php
                   }
                   ?>
              <div class="col-xs-10 col-ms-offset-1">
                <input id="usuario" class="form-control Input" type="text" name="name" class="form-control" placeholder="" maxlength="50"  value="<?php echo $name ?>"/>
                <span class="text-danger"><?php echo $nameError; ?></span>
                
              </div>    
            </div>
          
            <div class="form-group">
              <label class="col-xs-10" for="password" ><h4>E-Mail</h4></label>
              <div class="col-xs-10 col-ms-offset-1">
                <input  id="password" class="form-control Input"     maxlength="30"     type="email" name="email"  placeholder="" maxlength="40" value="<?php echo $email ?>"/>
                <span class="text-danger"><?php echo $emailError; ?></span>
              </div>

              <label class="col-xs-10" for="password" ><h4>Password</h4></label>
              <div class="col-xs-10 col-ms-offset-1">
                <input  id="password" class="form-control Input" type="password" name="pass" placeholder="" maxlength="15"/>
                <span class="text-danger"><?php echo $passError; ?></span>
              </div>

              <div id="form-group" class="col-xs-11 form-group">
                <button  type="submit" name="btn-signup" class="btn btn-danger center-block">SignUp</button>
                <a href="index.php">back</a> <br>
                <a  href="login.php">Login  here...</a>
              </div>  
            </div>
          </form>
        </fieldset>
        
      </div>
      
    </div>



  
</body>
</html>
<?php ob_end_flush(); ?>