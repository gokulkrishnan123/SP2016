<?php 
session_start();
?>


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
       <li id="top_bar"><a href="deleteSurvey.php">Retake Survey</a></li>
       
       <button id="notif" type="button" class="btn btn-default btn-lg"> 
  <span class="glyphicon glyphicon-globe" aria-hidden="false"></span> 
</button>
       
     <button id="star" type="button" onclick="document.location.href='allMessages.php'" class="btn btn-default btn-lg"> 
  <span class="glyphicon glyphicon-comment" aria-hidden="false"></span> 
</button>
     
  <?php echo "<img id='top_bar_img' src=".$_SESSION['url'] ?>
     <div class="dropdown">
  <button id="pi" class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    
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

 
 
 
  <div id="image_2"></div>
  
              <p class="scrolldown">frer
 <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
</p>
         </header>  
<h2 id="bttp"> Welcome,   <?php echo $_SESSION['name'] ?>! </h2>






     <p id="ftp" class="scrolldown"> Scroll down to see your profile <br>
 <a id="betaa" class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
</p>
      

      <section id="about">
 
 <div id="profile_beta" class="container">
  <h2>Profile</h2>
  <br>
  <table id="info" class="table">
  
      <tr>
        <th>Name</th>
        <th><?php echo $_SESSION['name'] ?></th>
      </tr>
   
   
      <tr>
        <th>Email</th>
        <th><?php echo $_SESSION['email'] ?></th>
      </tr>
       
  </table>
</div>
  
  

   </section>

   <!-- Header End -->
   

 

 <!-- About Section End-->
 <!--<section id="matches">
    <form action="getMatches.php">
                  <input type="submit" value="Matches">
</form>
   
    
   </section>-->
    <p>&copy; 2016 Ashley, Gokul, Piyush, Sunny & Varun<p>
    <!-- Insert your content here --></body>
</html>

