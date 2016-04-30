<?php
session_start();
if (isset($_SESSION['fbloginid']))
{
header('Location: varunpro.php');
    //Do stuff
}
else {
?>
<script>
alert('Please sign in through facebook to view your profile');
window.location.href='varun.html';
</script>
<?php

//header('Location: varun.html');
}


?>
