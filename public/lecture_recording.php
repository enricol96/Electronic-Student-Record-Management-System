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
    <?php include("includes/head.php");?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <link rel="stylesheet" type="text/css" href="css/lecture_rec.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css"> 
    <link href="css/lecture_rec.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
    
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="./css/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.css">
 </head>

  <body>
    <?php include("includes/header.php"); ?>
    
    <main role="main" class="container-fluid">

    <div class="bootstrap-iso">
      <h1 class="h3 mb-3 font-weight-normal">Lesson recording</h1>
        <form method="post">
          <!-- Class selection -->
          <!-- Just a placeholder -->
          <div class="form-group-class">
              <label for="classSelection">Select a class</label>
              <select class="form-control" id="classSelection">
                <option>1A</option>
                <option>2A</option>
                <option>3B</option>
              </select>
            </div>

          <!-- Subject selection -->
          <!-- Just a placeholder -->
          <div class="form-group-class">
            <label for="subjectSelection">Select a subject</label>
            <select class="form-control" id="subjectSelection">
              <option>Science</option>
              <option>Algebra</option>>
            </select>
          </div>

          <!-- Date picker -->
          <div class="form-group-class" data-provide="datepicker">
            <label for="datadainserire" class="col-form-label">Select a date</label>
            <input type="text" class="form-control" id="date">
              <div class="input-group-append">
                 <span class="input-group-text" id="basic-addon2"><span class="fa fa-calendar"></span></span>
              </div>
          </div>

          <script>
            var data=new Date();
            var currDay=data.getDay();

            currDay = currDay -1;

            //alert("Debug" + currDay.toString());

            $('#date').datepicker({
                format: 'mm/dd/yyyy',
                startDate: -currDay,
                endDate: "+7d",
                todayBtn: true,
                daysOfWeekDisabled: "5,6",
                autoclose: true
            });
           </script>

            <!-- Hour selection -->
            <div class="form-group-hour">
              <label for="hourSelection">Select an hour</label>
              <select class="form-control" id="hourSelection">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
            </div>

            <!-- Text area for lecture's topic recording -->
            <div class="form-group-text">
              <label for="lectureTextArea">Insert the lecture topics</label>
              <textarea class="form-control" id="lectureTextArea" rows="3"></textarea>
            </div>
          </form>
          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
          </form>
      </div>
    </main>

    <?php include("includes/footer.php"); ?>
  </body>
</html>