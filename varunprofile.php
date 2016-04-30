<?php
session_start();

        require 'database.php';

?>

<script type="text/javascript">

  var username = '<%= Session["UserName"] %>'; 
</script>

<html lang="en">
<head>
     <title> Profile </title>
    <link rel="stylesheet" href="css_2/default.css">
  <link rel="stylesheet" href="css_2/layout.css">
   <link rel="stylesheet" href="css_2/media-queries.css">
   <link rel="stylesheet" href="css_2/magnific-popup.css"> 
   <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    
    .table th, .table td { 
     border-top: none !important;
     height: 60px;
     
 }
  </style>
</head>

<body>
 <header id="home">

      <nav id="nav-wrap">

         <ul id="nav" class="nav">
            <li id="top_bar" class="current"><a class="smoothscroll" href="varun.html">Home</a></li>
            <li id= "top_bar"><a class="smoothscroll" href="#about">Profile</a></li>
           <li id="top_bar"><a href="survey2.html">Survey</a></li>
       <li id="top_bar"><a href="getMatches.php">Matches</a></li>
       <li><button class="btn btn-link" onclick="location.href='varunprofile.php';">Profile</button></li>
       
       <button id="notif" type="button" class="btn btn-default btn-lg"> 
  <span class="glyphicon glyphicon-globe" aria-hidden="false"></span> 
</button>
       
     <button id="star" type="button" class="btn btn-default btn-lg"> 
  <span class="glyphicon glyphicon-comment" aria-hidden="false"></span> 
</button>
     
           <img id="top_bar_img" src="img_meet/the_great_shah.jpg">
     <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
    <li><a href="#">Edit Profile</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="#">Log Out</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">About Us</a></li>
  </ul>
</div>
</div>

       </div>
           
         </ul> <!-- end #nav -->
           


      </nav> <!-- end #nav-wrap -->

      <!--<div class="row banner">
         <div class="banner-text">
        <form action="survey2.html">
    <input type="submit" value="Fill out Roommate Survey">
  </form>-->
  </div>
  
  <?php echo "<img id='profile_pic' src=".$_SESSION['url'] ?>
  
  
   </header>
 
 <h2 id="bttp"> Welcome, Sunny!</h2>
 
 <p id="ftp" class="scrolldown"> Scroll down to see your profile <br>
 <a id="betaa" class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
</p>
 
 
  <section id="about">
 
 <div class="container">
  <h2>Profile</h2>
  <br>
  <table id="info" class="table">
  
      <tr>
        <th>Name</th>
        <th id="name_first"> </th>
        <script>
document.getElementById('name_first').innerHTML =
  'Welcome: ' + myVariable.name + '!';
</script> 
      </tr>
   
   
      <tr>
        <th>Email</th>
        <th id="email_beta"> </th>
         <script>
document.getElementById('email_beta').innerHTML =
  'Welcome: ' + myVariable.email + '!';
</script>
      </tr>
      <tr>
        <th>Age</th>
        <th id="age_beta"> </th>
         <script>
document.getElementById('age_beta').innerHTML =
  myVariable.age + '!';
</script>
      </tr>
      <tr>
        <th>Bio</th>
        <th id="bio_beta"> </th>
        <script>
        document.getElementById('bio_beta').innerHTML =
        myVariable.bio + '!';
        </script>
      </tr>
  
  </table>
</div>
  
  

   </section>
  
 <p>&copy; 2016 Ashley, Gokul, Piyush, Sunny & Varun<p>
    <!-- Insert your content here --></body>
</html>
 