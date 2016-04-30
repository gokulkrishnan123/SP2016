<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/default.css">
      <link rel="stylesheet" href="css/layout.css">
      <link rel="stylesheet" href="css/media-queries.css">
      <link rel="stylesheet" href="../css/magnific-popup.css"> 
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <style>
         body { padding-top: 50px; }
      </style>
   </head>
   <body>
      <nav id="nav-wrap">
         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="varun.html">Home</a></li>
            <li><a class="smoothscroll" href="verifyUser.php">Profile</a></li>
            <li><a class="smoothscroll" href="getMatches.php">Matches</a></li>
         </ul> <!-- end #nav -->
      </nav>
      <?php
         require 'database.php';
         session_start();
         $rooms = $_GET["rooms"];
         $myID = $_SESSION["fbloginid"];
         $roomArray = explode('_', $rooms);
         echo "<table id='all_table'  border =1 style ='width:50%' id = 'list'>";
         
         foreach ($roomArray as $room){
            $IDS = explode('99999',$room);
            $otherID = 0;
            if($IDS[0]==$myID){
               $otherID = $IDS[1];
            }
            else{
               $otherID = $IDS[0];
            }
            $query = "SELECT Name, url FROM Users WHERE ID = '".$otherID."'";
            $getName = $mysqli->prepare($query);
            if(!$getName){
               printf("Query Prep Failed: %s\n", $mysqli->error);
               exit;
            }
            $getName->execute();
            $result = $getName->get_result();
            $row = $result->fetch_assoc();
            $other_name =  $row['Name'];
            $other_picture_url = $row['url'];
            $getName->close();

echo "<tr>
               <td><img id='all_chats' src= ".$other_picture_url."></td>
               <td><a href=http://52.33.163.109/chatroom.php?roomID=".$room."> ".$other_name."</a></td>
               </tr>";
         }


      
         echo "</table>"
      ?>
   </body>
</html>

