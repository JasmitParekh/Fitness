<?php 
  session_start(); 
  //accessible to only logged in users.
  if (!isset($_SESSION['id'])) {
?>

    <script type="text/javascript">
      alert("You must Log-In First");
      window.location = "index.php";
    </script>
    
<?php
  }              
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Workouts
        </title>
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <style>
            .active{
                background: beige;
            }
            body {
            margin: 0;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="header" style="color:#ffffff;">
                <a href="homepage.html">
                   <img src="images/logo.png" width=35px height=30px>
                   <h1 style="display: inline; ">FITNESS 101</h1>
                </a>
                <div class="dropdown">
                    <button class="dropbtn"><img src="images/user.png" width=40px height=40px ></button>
                    <div class="dropdown-content">
                        <a href="help.php">Report Problem</a>
                        <a href="contactus.html">Contact Us</a>
                        <a href="member.php">Dashboard</a>  
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </header>
    
        <nav>
            <div id="navigation">
                <a href="workout.php">HIIT</a>
                <a href="workout1.php" >Stretching</a>
                <a href="workout2.php">Weight Training</a>
                <a href="workout3.php">Flexibility Training</a>
                <a href="workout4.php">Yoga</a>
                <a href="workout5.php" class="active" >Pilates</a>
            </div>
        </nav>
        <h2 style="text-align: center; font-family: Satisfy;">At Home Pilates Burnout for Ab & Plank Lovers !</h2>

        <div class="pilates" id="pilates" >
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>

            * {
            box-sizing: border-box;
            }
            
            img {
            vertical-align: middle;
            }
            
            /* Position the image container (needed to position the left and right arrows) */
            .container {
            position: relative;
            height:300px;
            }
            
            /* Hide the images by default */
            .mySlides {
            display: none;
            }
            
            /* Add a pointer when hovering over the thumbnail images */
            .cursor {
            cursor: pointer;
            }
            
            /* Next & previous buttons */
            .prev,
            .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: black;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
            }
            
            /* Position the "next button" to the right */
            .next {
            right: 0;
            border-radius: 3px 0 0 3px;
            }
            
            /* On hover, add a black background color with a little bit see-through */
            .prev:hover,
            .next:hover {
            background-color: rgba(0, 0, 0, 0.5);
            }
            
            /* Number text (1/3 etc) */
            .numbertext {
            color: black;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
            }
            
            /* Container for image text */
            .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
            }
            
            .row:after {
            content: "";
            display: table;
            clear: both;
            }
            
            /* Six columns side by side */
            .column {
            float: left;
            width: 16.66%;
            }
            
            /* Add a transparency effect for thumnbail images */
            .demo {
            opacity: 0.3;
            }
            
            .active,
            .demo:hover {
            opacity: 1;
            }
			*{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
  
            }
            .header {
    background-color: #000000;
    padding: 2%;
    
}
.header a{
    text-decoration-line: none;
    color:#ffffff;
}
nav div#navigation{
    text-decoration: none;
    background:rgba(0,0,0,0.1);
    padding:2%;
    /*margin:2%;*/
    text-align:center;
}
nav>div>a{
    color: black;
    text-align: center;
    padding: 10px 15px 10px 15px;
    text-decoration: none;
    font-size: 16px; 
    line-height: 25px;
    border-radius: 4px;  
}  
nav>div>a:hover{
    background:rgba(255, 255, 255, 0.6);
    color:#000000;
}
.dropbtn {
  background-color: #000000;
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropdown {
  position: relative;
  float:right;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 130px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
  right: 0;
}
.dropdown-content a {
  color: black;
  padding: 4%;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {
    background-color: rgba(0,0, 0, 0.2);
}
.dropdown:hover .dropdown-content {
  display: block;
}
s
            </style>
            <body>
            
            <!-- <h2 style="text-align:center">HIIT</h2> -->
            
            <div class="container" >
                <div class="mySlides">
                    <div class="numbertext">1 / 6</div>
                    <img src="images\warmup1.gif" style="width:60%; height:400px; display: block;margin-left: auto; margin-right: auto; ">
                </div>
                
                <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                    <img src="images\one1.gif" style="width:60%; height:400px;  display: block;margin-left: auto; margin-right: auto;">
                </div>
                
                <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                    <img src="images\two1.gif" style="width:60%; height:400px;  display: block;margin-left: auto; margin-right: auto;">
                </div>
                    
                <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                    <img src="images\three1.gif" style="width:60%; height:400px;  display: block;margin-left: auto; margin-right: auto;">
                </div>
                
                <div class="mySlides">
                    <div class="numbertext">5 / 6</div>
                    <img src="images\four1.gif" style="width:60%; height:400px;  display: block;margin-left: auto; margin-right: auto;">
                </div>
                    
                <div class="mySlides">
                    <div class="numbertext">6 / 6</div>
                    <img src="images\cool1.gif" style="width:60%; height:400px;  display: block;margin-left: auto; margin-right: auto;">
                </div>
                    
                <a class="prev" onclick="plusSlides(-1)"> &#8249; </a>
                <a class="next" onclick="plusSlides(1)"> &#8250; </a>
                
                <div class="caption-container">
                    <p id="caption"></p>
                </div>
                
                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="images\t1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Warm Up ">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="images\t2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Step 1: 20 reps">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="images\t3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Step 2 : 20 reps">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="images\t4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Step 3 : 20 reps : Almost there don't give Up!">
                        </div>
                        <div class="column">
                        <img class="demo cursor" src="images\t5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Step 4 : 20 reps : Last One Now Keep Going!!">
                        </div>    
                        <div class="column">
                        <img class="demo cursor" src="images\t6.jpg" style="width:100%" onclick="currentSlide(6)" alt="Cool Down : You did it!">
                    </div>
                </div>
            </div>
            
            <script>
            var slideIndex = 1;
                showSlides(slideIndex);
            
            function plusSlides(n) {
                showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
                showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                captionText.innerHTML = dots[slideIndex-1].alt;
            }
            </script>
            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
            
        </div>

        
        <footer >
            <div class="footer"m align="center">
                FOLLOW US<br>
				<br>
                <div id="social-media">
                    <a href="https://www.instagram.com/rajshree.varma/saved/?hl=en"><img src="images/f.png" alt="visit our facebook" class="social"></a>
                    <a href="https://www.instagram.com/rajshree.varma/saved/?hl=en"><img src="images/I.png" alt="visit our instagram " class="social"></a>
                    <a href="https://www.instagram.com/rajshree.varma/saved/?hl=en"><img src="images/twitterx.png" alt="visit our twitter " class="social"></a>
                    <br>
                </div>
				<br>
                <!-- Copyright -->
                <div class="footer-copyright" style=" background-color:rgba(255, 255, 255, 0.13); align-items: center;">
                    &#169; 2024 Copyright: 
                  <a href="#homepage" style="text-decoration:none; color:green;"> Fitness.com</a> 
                  All rights reserved.<br>
                </div>
                <!-- Copyright -->
            </div>
			<br>
			<br>
        </footer>
    </body>
</html>