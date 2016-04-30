<html>
   <head>
      <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
      <link rel='stylesheet' href='https://cdn.firebase.com/libs/firechat/2.0.1/firechat.min.css' />
      <script src='https://cdn.firebase.com/libs/firechat/2.0.1/firechat.min.js'></script>
   </head>
   <body>
      <input type ='text' style="display: none" id='invis_room_id' name='invis_room_id'
            <?php
               require 'database.php';
               session_start();
               echo "value = '".$_SESSION["fbloginid"]."' " ?> />
      <div id="usersRooms">
      </div>
   </body>
</html>
<script>
   var fbID = document.getElementById('invis_room_id').value;
   //console.log("fbloginid: "+ fbID);
   var patt= new RegExp("(\.+)99999(\.+)");
   var room = new Firebase('https://fiery-inferno-8902.firebaseio.com/rooms/');
   var personRooms = "";
   room.once("value",function(snapshot){
      snapshot.forEach(function(room){
         var roomID = room.key();
         //console.log("----------"+ roomID);
         if (patt.test(roomID)) {
            var firstID = patt.exec(roomID)[1];
            var secondID = patt.exec(roomID)[2];
            if (fbID == firstID || fbID == secondID) {
               //var node = document.createElement("li");
               //var a = document.createElement("a");
               //a.setAttribute('href', "http://52.33.163.109/chatroom.php?roomID="+roomID);
               //if (fbID == firstID) {
               //   a.innerHTML = secondID;
               //}
               //else{
               //   a.innerHTML = firstID;
               //}
               //node.appendChild(a);
               //document.getElementById("usersRooms").appendChild(node);
               personRooms += (roomID+"_");
               console.log(personRooms);
            }
         }
      });
      window.open("viewAllMessages.php?rooms="+personRooms,"_self");
   });
   
</script>