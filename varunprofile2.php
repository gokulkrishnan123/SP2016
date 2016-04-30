<?php
session_start();

        require 'database.php';

        echo $_SESSION['fbloginid'] = $_GET['userID'];
?>
<html lang="en">
<head>
     <title> Profile </title>
    <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout2.css">
   <link rel="stylesheet" href="css/media-queries.css">
   <link rel="stylesheet" href="css/magnific-popup.css"> 
   <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
 <header id="home">

      <nav id="nav-wrap">

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#prof">Profile</a></li>
	         <li><a class="smoothscroll" href="#survey">Survey</a></li>
			 <li><a class="smoothscroll" href="#matches">Matches</a></li>
           
            <button type="button" id="account" class="btn btn-link">Create Account</button>
         </ul> <!-- end #nav -->
           


      </nav> <!-- end #nav-wrap -->

      <div class="row banner">
         <div class="banner-text">
        <form action="survey2.html">
    <input type="submit" value="Fill out Roommate Survey">
  </form>

  </div>
  <div id="image"></div>
             <script>
  var img = document.createElement("IMG");
  img.src = (myUrl);
  document.getElementById('image').appendChild(img);
  console.log((myVariable.picture["data"])["url"]);
  console.log(myVariable.gender);
  console.log('stringify' + JSON.stringify(myVariable));
  console.log(myVariable.birthday);
  
  </script>

<h3 id="name"><span>  </span></h3>
<script>
document.getElementById('name').innerHTML =
  'Welcome: ' + myVariable.name + '!';
</script>           
            <hr />
         </div>
      </div>
      

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->
   

 <section id="prof">
	
	
	<div id="profile" class="container">
	<h2>Profile</h2>
<div class="container">
  <p class="desc">
			This is your profile, dawg!
		</p>        
<h3 id="name2"><span>  </span></h3>
<p id="name">Name</p>
  <p id="email">Email</p>
  <p id="age">Age</p>
  <p id="gender">Gender</p>
  <div id="placehere">
<script>
document.getElementById('name2').innerHTML =
  'Welcome: ' + myVariable.name + '!';
  document.getElementById('email').innerHTML =
  'Email: ' + myVariable.email;
  document.getElementById('age').innerHTML =
  'Age: ' + myVariable.age_range["min"];
  document.getElementById('gender').innerHTML =
  'Gender: ' + myVariable.gender;
</script>
  
</div>
<br>
<br>




<br>
<br>

	</div>
	
	
	
	

   </section>

 <!-- About Section End-->
 <section id="matches">
    <form action="getMatches.php">
                  <input type="submit" value="Matches">
</form>
   
    
   </section>    
    <p>&copy; 2016 Ashley, Gokul, Piyush, Sunny & Varun<p>
    <!-- Insert your content here --></body>
</html>
