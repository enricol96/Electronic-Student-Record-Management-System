<?php
include("includes/config.php"); 
require_once('utility.php');
/* HTTPS CHECK */
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
} else {
  $redirectHTTPS = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  myRedirectToHTTPS($redirectHTTPS);
  exit;
}
check_inactivity();
if(!isset($_SESSION)) 
  session_start();
 
/* LOGGED IN CHECK */
if(!userLoggedIn()) {   
  myRedirectTo('login.php', 'SessionTimeOut');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("includes/head.php"); ?>
  <link href="../css/dashboard.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php include("includes/user_header.php"); ?> 
  <?php include("includes/dashboard_secretary.php"); ?> 

  <script>
    var homeElement = document.getElementById("homeDash");
    var recordParentElement = document.getElementById("recordParentDash");
    if (homeElement.classList) {
      homeElement.classList.add("active");
    }   
    if (recordParentElement.classList) {
        recordParentElement.classList.remove("active");
    } 
  </script>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <h1 class="mt-5">User Parent Main Page</h1>
  </main>

</body>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

</html>