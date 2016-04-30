<input type ='text' style="display: none" id='invis_room_id' name='invis_room_id'
<?php echo "value = '".$_SESSION['fbloginid']."' " ?>
/>

<?php session_start(); ?>
<script>
console.log('hello')
</script>

<html>

<head>

  <title>Your Matches</title>

  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/default2.css">
<link rel="stylesheet" href="css/layout3.css">
<link rel="stylesheet" href="css/media-queries.css">
<link rel="stylesheet" href="css/magnific-popup.css"> 
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>

  body {

    background-color: #F3EFE0;

  }



  @font-face {

   font-family: fancyFont;

   src: url(/scriptina/SCRIPTIN.ttf);

 }



.matches_container {

  border-radius: 10px;

  margin-top: 20px;

  text-align: center;

}



button {

  background-color: #000;

}



h2{



  font-size: 150%;

  font-family: bold;

  position:relative;

  top: 0px;

  left: 0px;

  color: #000;



}



h3{

  font-size: 125%;

  font-family: cursive;

  position:relative;

  top: 0px;

  left: 0px;

  color:red;

}

td{

  padding: 0px;

}



img

{

  border-radius: 70px;

}


ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    font-size: 18px;
}

ul.pagination li a.active {
    background-color: #eee;
    color: black;
    border: 1px solid #ddd;
}

ul.pagination li a:hover:not(.active) {background-color: #ddd;}


</style>

</head>



<body>
<header id="home">
<nav id="nav-wrap">
<ul id="nav" class="nav">
<li class="current"><a href="varun.html">Home</a></li>
<li><a href="varunpro.php">Profile</a></li>
<li><a href="survey2.html">Survey</a></li>
<li><a href="getMatches.php">Matches</a></li>
</ul> <!-- end #nav -->
</nav>
</header>
  <script>

  function myFunction() {

    console.log('successful click');

  }

  </script>

  <div class="container">

    <div class="row">

      <div class="col-md-6 col-md-offset-3 matches_container">

        <h1> Your Matches! </h1>



        <table id="my_table" style="width:600px" cellspacing="20">

          <tr>

            <td height="170"><img id="match_1" src=<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][1]?> height="142" width="142" alt="Test Image" /></td>

            <td>

              <h2> <?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][0]?></h2>

              <br>

              <h3> <?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][2] ?>% Compatible</h2>

              </td> 



              <td>

                <button type="button" id="message1" class="btn btn-default">Message</button> <br> <br>

                <button type="button" id="match1" class="btn btn-primary">View Profile</button>

              </td>

            </tr>



            <tr>

              <td height="170"><img src=<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][1]?> height="142" width="142" alt="Test Image" /></td>

              <td><h2> <?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][0] ?></h2>

               <br>

               <h3> <?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][2] ?>% Compatible</h2>

               </td>  

               <td>

                <button type="button" id="message2" class="btn btn-default">Message</button> <br> <br>

                <a href="#aboutModal" data-toggle="modal" data-target="#myModal">

                  <button type="button" id="match2" class="btn btn-primary"></a>View Profile</button>

                </td>

              </tr>



              <tr>

                <td height="170"><img src=<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][1] ?> height="142" width="142" alt="Test Image" /></td>

                <td><h2> <?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][0] ?></h2>

                 <br>

                 <h3> <?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][2] ?>% Compatible</h2>

                 </td>

                 <td>

                  <button type="button" id="message3" class="btn btn-default">Message</button> <br> <br>

                  <a href="#aboutModal" data-toggle="modal" data-target="#myModal">

                    <button type="button" id="match3" class="btn btn-primary"></a>View Profile</button>

                  </td>

                </tr>

              </table>

            </div>

      
      <p>Next/Previous buttons:</p>
    <ul class="pagination">
    <li><a href="#" id="previous">❮</a></li>
    <li><a href="#" id="next">❯</a></li>
  </ul>

            <script type="text/javascript">



            $(document).ready(function(){

  
    $("#next").click(function(){
    console.log("inside next");
    window.location="next.php";
    //var something = <?php $_SESSION['matchSet'] = $_SESSION['matchSet']+1;?>
    //var test = "<?php json_encode($_SESSION['matchSet'])?>";
    //console.log(test);
    //location.reload();

              });

    $("#previous").click(function(){
    window.location="previous.php";
    //console.log("inside previous");
                //<?php $_SESSION['matchSet'] = $_SESSION['matchSet']-1;?>
                //location.reload();

              });


    
  
              $("#match1").click(function(){



                document.getElementById("profilepic").src = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][1] ?>";

                document.getElementById("similarity").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][2] ?>% Compatibility";

                document.getElementById("labelname").innerHTML = "More About <?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][0] ?>";
    
    document.getElementById("matchBio").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][9] ?>";

                document.getElementById("exitname").innerHTML = "I've heard enough about <?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][0]?>";

                document.getElementById("sim1").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][4] ?>";

                document.getElementById("sim2").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][5] ?>";

                document.getElementById("sim3").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][6] ?>";

                document.getElementById("sim4").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][7] ?>";

                document.getElementById("sim5").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][8] ?>";

    document.getElementById("sim6").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][11] ?>";

                document.getElementById("sim7").innerHTML = "<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][12] ?>";

                $("#myModal").modal();



              });

$("#message1").click(function(){

console.log('messaged person 1');

var room_id_j = document.getElementById('invis_room_id').value;


var htmlString="<?php echo $_SESSION['fbloginid']; ?>";

      console.log("bigger="+htmlString);

var otherID="<?php echo $_SESSION['matches'][0+$_SESSION['matchSet']][10]; ?>";

console.log(otherID);

var bigger=0;

var smaller=0;

if (otherID>htmlString) {

bigger=otherID;

smaller=htmlString;

}

if (htmlString>otherID) {

                     bigger=htmlString;

                     smaller=otherID;

        }

var roomID=smaller+'99999'+bigger;

console.log("roomID=" + roomID);

console.log("bigger=" + bigger);

console.log("smaller=" +smaller);

window.open("chatroom.php?roomID=" + roomID);

});

$("#message2").click(function(){

        console.log('messaged person 2');

        var room_id_j = document.getElementById('invis_room_id').value;



var htmlString="<?php echo $_SESSION['fbloginid']; ?>";

      console.log("bigger="+htmlString);

        var otherID="<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][10]; ?>";

        console.log(otherID);

        var bigger=0;

        var smaller=0;

        if (otherID>htmlString) {

                bigger=otherID;

                smaller=htmlString;

        }

        if (htmlString>otherID) {

                     bigger=htmlString;

                     smaller=otherID;

        }

        var roomID=smaller+'99999'+bigger;

        console.log("roomID=" + roomID);

        console.log("bigger=" + bigger);

        console.log("smaller=" +smaller);

        window.open("chatroom.php?roomID=" + roomID);

});

$("#message3").click(function(){

        console.log('messaged person 3');

        var room_id_j = document.getElementById('invis_room_id').value;



var htmlString="<?php echo $_SESSION['fbloginid']; ?>";

      console.log("bigger="+htmlString);

        var otherID="<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][10]; ?>";

        console.log(otherID);

        var bigger=0;

        var smaller=0;

        if (otherID>htmlString) {

                bigger=otherID;

                smaller=htmlString;

        }

        if (htmlString>otherID) {

                     bigger=htmlString;

                     smaller=otherID;

        }

        var roomID=smaller+'99999'+bigger;

        console.log("roomID=" + roomID);

        console.log("bigger=" + bigger);

        console.log("smaller=" +smaller);

        window.open("chatroom.php?roomID=" + roomID);

});

$("#match2").click(function(){



  document.getElementById("profilepic").src = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][1] ?>";

  document.getElementById("similarity").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][2] ?>% Compatibility";

  document.getElementById("labelname").innerHTML = "More About <?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][0] ?>";

   document.getElementById("matchBio").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][9] ?>";  

  document.getElementById("exitname").innerHTML = "I've heard enough about <?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][0] ?>";

  document.getElementById("sim1").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][4] ?>";

  document.getElementById("sim2").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][5] ?>";

  document.getElementById("sim3").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][6] ?>";

  document.getElementById("sim4").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][7] ?>";

  document.getElementById("sim5").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][8] ?>";

  document.getElementById("sim6").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][11] ?>";

  document.getElementById("sim7").innerHTML = "<?php echo $_SESSION['matches'][1+$_SESSION['matchSet']][12] ?>";

  $("#myModal").modal();



});



$("#match3").click(function(){



  document.getElementById("profilepic").src = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][1] ?>";

  document.getElementById("similarity").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][2] ?>% Compatibility";

  document.getElementById("labelname").innerHTML = "More About <?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][0] ?>";

   document.getElementById("matchBio").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][9] ?>";

  document.getElementById("exitname").innerHTML = "I've heard enough about <?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][0] ?>";

  document.getElementById("sim1").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][4] ?>";

  document.getElementById("sim2").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][5] ?>";

  document.getElementById("sim3").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][6] ?>";

  document.getElementById("sim4").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][7] ?>";

  document.getElementById("sim5").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][8] ?>";

  document.getElementById("sim6").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][11] ?>";

  document.getElementById("sim7").innerHTML = "<?php echo $_SESSION['matches'][2+$_SESSION['matchSet']][12] ?>";

  $("#myModal").modal();



});



});



</script>

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

        <h4 class="modal-title" id="labelname">More About Joe</h4>

      </div>

      <div class="modal-body">

        <center>

          <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" id="profilepic" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>

          <h3 class="media-heading" id="similarity">Joe Sixpack <small>USA</small></h3>

          <span><strong>Similarities: </strong></span>

          <span class="label label-warning" id="sim1">HTML5/CSS</span>

          <span class="label label-info" id="sim2">Adobe CS 5.5</span>

          <span class="label label-info" id="sim3">Microsoft Office</span>

          <span class="label label-success" id="sim4">Windows XP, Vista, 7</span>

          <span class="label label-success" id="sim5">Vista</span>
  
    <span class="label label-warning" id="sim6">Vista</span>

    <span class="label label-info" id="sim7">Vista</span>

        </center>

        <hr>

        <center>

          <p class="text-left" id="matchBio"><strong>Bio: </strong><br>

            </p>

            <br>

          </center>

        </div>

        <div class="modal-footer">

          <center>

            <button type="button" class="btn btn-default" id="exitname" data-dismiss="modal">I've heard enough about Joe</button>

          </center>

        </div>

      </div>

    </div>

  </div>

</div>

</div>

</div>



</body>

</html>

