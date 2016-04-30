<!doctype html>
<html>
   <head>
	<link rel="stylesheet" type="text/css" href="style2.css">
      <link rel='stylesheet' type='text/css' href='chat.css'>
      <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
      <link rel='stylesheet' href='https://cdn.firebase.com/libs/firechat/2.0.1/firechat.min.css' />
      <script src='https://cdn.firebase.com/libs/firechat/2.0.1/firechat.min.js'></script>
   </head>
   <body>
   <?php
      session_start();
      require 'database.php';

      //$stmt = $mysqli->prepare("SELECT otherID FROM Users WHERE ID='".$_SESSION['fbloginid']."'");

      //$stmt2 = $mysqli->prepare("SELECT otherID FROM Users WHERE ID='".$_SESSION['other']."'"
      

      if(isset($_GET['roomID'])){
         $_SESSION['room_id'] = $_GET['roomID'];
      }
      else{
         $_SESSION['room_id'] = 0;
      }
      $theIDs=$_SESSION['room_id'];
      $index=strrpos($theIDs, '99999', -5);
      
      $secondName=substr($theIDs,($index+5)); 
      $_SESSION["secondPerson"] = $secondName;
      $rest = substr($theIDs, -40, $index);
      $_SESSION["firstPerson"] = $rest;
      
      $stmt1 = "SELECT matchStatus, otherID FROM Users WHERE ID=".$_SESSION['fbloginid'];
      $stmt = $mysqli->prepare($stmt1);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      $matchStatus = $row["matchStatus"];
      $otherID = $row["otherID"];

      if ($_SESSION['fbloginid']==$_SESSION["secondPerson"]) {
         //echo "first";
         $_SESSION['otherMatchID'] = $_SESSION['firstPerson'];
      }	
      if ($_SESSION['fbloginid']==$_SESSION["firstPerson"]) {
         //`:w
         //echo "second";
         $_SESSION['otherMatchID'] = $_SESSION['secondPerson'];
      }


      $stmt2 = $mysqli->prepare("SELECT otherID, isMatched FROM Users WHERE ID='".$_SESSION['fbloginid']."'");

      $stmt3 = $mysqli->prepare("SELECT otherID, isMatched FROM Users WHERE ID='".$_SESSION['otherMatchID']."'");

	$stmt2->execute();
	$result2=$stmt2->get_result();
	$rowSelf = $result2->fetch_assoc();
	$myMatch = $rowSelf["otherID"];
	$myMatchStatus = $rowSelf["isMatched"];
	
	$stmt3->execute();
	$result3=$stmt3->get_result();
	$rowOther = $result3->fetch_assoc();
	$otherMatch = $rowOther["otherID"];
	$otherMatchStatus = $rowOther["isMatched"];
	
//	echo $myMatch;
//	echo $otherMatch;
	$happilyMatched=0;
	if ($_SESSION['fbloginid'] == $otherMatch && $_SESSION['otherMatchID'] == $myMatch && $myMatchStatus == 1 && $otherMatchStatus == 1) {
		echo "Successfully Matched!";
	}
	if($_SESSION['fbloginid'] == $otherMatch && $_SESSION['otherMatchID'] == $myMatch && $myMatchStatus == 0 && $otherMatchStatus == 0)
	{
		$happyilyMatched=1;
		echo "Successully matched";
		header('Location: happilyMatched.php'); 
	}

      if ($matchStatus==1) {
         if ($otherID!=$_SESSION['otherMatchID']) {
            echo "If you are interested in living with this person, you must unmatch your current proposed roommate"; ?>
            <button type="button" onclick="myFunction2()">Remove Current Match</button>
            <style type="text/css"> #divId{ display:none; } </style>
   <?php }
         else {
	//	echo $happyilyMatched;
		if ($happilyMatched==0) {
			
           		 echo " Thanks for accepting this person. ";
        	}
		else {
		//	echo "test";
		} 
	}
      }
      else{
         $stmt->close(); ?>
         <button type="button" onclick="myFunction()">Accept Match</button>
         <style type="text/css"> #divId{ display:none; }</style>
	<?php
      }
      ?>
      <script type="text/javascript">
      function myFunction() {
         console.log("trying to accept");
         window.location.href='updateStatus.php';
      }
      function myFunction2() {
               console.log("trying to reject");
               window.location.href='rejectMatch.php';
      }
      </script>
      <h1> </h1>
      <div id='messagesDiv'></div>
      
      <input type='text' id='nameInput' placeholder='Name'>
      <input type='text' id='messageInput' placeholder='Message'>
      <input type ='text' style="display: none" id='invis_room_id' name='invis_room_id'
             <?php echo "value = '".$_SESSION["room_id"]."' " ?> />
   </body>
</html>

<script>
      function reqListener () {
         console.log(this.responseText);
	// need to make matchStatus 1 in the database
	//need to add $_SESSION["otherMatchID"] to the otherID field in the users database
      }
      
      var oReq = new XMLHttpRequest(); //New request object
      oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        window.name=this.responseText;
      //	alert(this.responseText); //Will alert: 42
      };
      oReq.open("get", "getName.php", true);
      //                               ^ Don't block the rest of the execution.
      //                                 Don't wait until the request finishes to 
      //                                 continue.
      oReq.send();
      //Firebase database
      //each chat between 2 people is a sub database in the whole database
      //use facebook IDs to create specific chatrooms
      //name taken from profile
      var root = new Firebase('https://fiery-inferno-8902.firebaseio.com/');
      var room_id_j = document.getElementById('invis_room_id').value;
      var room = new Firebase('https://fiery-inferno-8902.firebaseio.com/rooms/'+room_id_j);
      var messages = new Firebase('https://fiery-inferno-8902.firebaseio.com/rooms/'+room_id_j+'/room-messages');
      var chat = new Firechat(room);
      chat.createRoom("room "+room_id_j, "public", function(room_id_j){
         chat.enterRoom(room_id_j);
      });
      
      $('#messageInput').keypress(function (e) {
         if (e.keyCode == 13) {
            var name = window.name;
            //$('#nameInput').val();//Take Name
            var text = $('#messageInput').val();
            console.log(text);
            document.getElementById("nameInput").innerHTML = name;
            document.getElementById("messageInput").innerHTML = text;  
            messages.push({name: name, text: text});
            $('#messageInput').val('');
         }
      });
      messages.on('child_added', function(snapshot) {
         var message = snapshot.val();
         displayChatMessage(message.name, message.text);
      });
      function displayChatMessage(name, text) {
         $('<div/>').text(text).prepend($('<em/>').text(name+': ')).appendTo($('#messagesDiv'));
         //    $('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
      };
    </script>
