<?php
require_once('utility.php');
session_start();
/* TYPE LOGGED IN CHECK */
if(!userTypeLoggedIn('TEACHER')) {   
    myRedirectTo('login.php', 'SessionTimeOut');
    exit;
}
header('Location: lecture_recording.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['class_sID_ssn']) && isset($_POST['date']) && isset($_POST['hour']) && isset($_POST['title']) && isset($_POST['subtitle']) && 
    !empty($_POST['class_sID_ssn']) && !empty($_POST['date']) && !empty($_POST['hour']) && !empty($_POST['title']) && !empty($_POST['subtitle'])){

        $fields = explode("_", $_POST['class_sID_ssn']);
        $class = $fields[0];
        $subjectID = $fields[1];
        $teacher = $fields[2];
        $date =$_POST['date'];
        $hour = $_POST['hour'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];

        $retval = recordTopic($class, $date, $hour, $subjectID, $teacher, $title, $subtitle);
        $_SESSION['msg_result'] = $retval;

    } else {
        $_SESSION['msg_result'] = TOPIC_RECORDING_INCORRECT;
    }
} else {
    $_SESSION['msg_result'] = TOPIC_RECORDING_FAILED;
}
?>