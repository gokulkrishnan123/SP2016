<!--This form controls the deleting of surveyes-->
<?php
    require 'database.php';
    session_start();
    $user_id = $_SESSION['fbloginid'];
    echo $user_id;
    //Deletes the story using the inputted story id
    $delete = $mysqli->prepare("DELETE FROM SurveyAnswers where userID = ?");
    if(!$delete){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
    }
    $delete->bind_param('i',$user_id);
    $delete->execute();
    $delete->close();
    header('Location: survey2.html');
?>