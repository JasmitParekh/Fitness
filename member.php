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
            Member's Area
        </title>
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <style>
            body{
                background:black;
                background-size: cover;
                margin:0;
            }
            body>div{   
                padding:1%;
            } 

            /* Pages Slide content*/

            .hero_content{
                justify-content: center;
                margin-left:5%;
            }
            .container {
            position: relative;
            width: 30%;
            float:left;
            margin-left:5%;
            margin-right:4%;
            margin-top:2%;
            margin-bottom:2%;
            }

            .image {
            display: block;
            width: 100%;
            height: auto; 
            }

            .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fcbb30;
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
            }

            .container:hover .overlay {
            height: 100%;
            }

            .text {
            color: white;
            font-size: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
            }
            .text a:hover{
                background:cornsilk;
                border-radius:10%;
            }

            /* Heading */
            .rotate {
            transform: rotate(180deg);
            }

            #heading {
            display: grid;
            height: 50%;
            justify-content: center;
            align-content: center;
            grid-template-columns: max-content max-content;
            margin-left:8%;
            margin-top:1%;
            float:left;
            }

            #heading h2 {
            font-size: 95px;
            margin: 0;
            writing-mode: vertical-lr;
            text-align: center;
            line-height: .9;

            }
            .active{
                background: black;
                color:white;
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

        </style>
    </head>
    <body>
        <header>
            <div class="header" style="color:white;">
                <img src="images/logo.png" width=35px height=30px>
                <h1 style="display: inline; ">FITNESS 101</h1>
                <div class="dropdown">
                    <button class="dropbtn"><img src="images/user.png" width=40px height=40px ></button>
                    <div class="dropdown-content">
                        <a href="help.php">Report Problem</a>
                        <a href="contactus.html">Contact Us</a>
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </header>

        
        <nav >
            <div id="navigation" style="background:white;">
                <a href="homepage.html">Home</a>
                <a href="health.html">Healthy Living</a>
                <a href="faq.html">FAQ</a>
                <a href="contactus.html">Contact Us</a>
                <a href="help.php">Help</a>
                <a class="active" href="member.php">Member's Area</a>
            </div>
        </nav>
            <div id="heading">
                    <h2 class="rotate" style="color:orange;">Member's</h2>
                    <h2 style="color:white;">Area</h2>
            </div>
            
            <div class="hero_content">
                <div class="container" >
                    <a href="profile.php">
                    <img src="images/pro.jpg" alt="My Profile" class="image">
                    <div class="overlay" style="background-color: #fcbb30;">
                        <div class="text">
                            Want to keep a funky username or change your password? View and Edit your details here.
                        </div>
                    </div>
                    </a>
                </div>
                <div class="container">
                    <a href="workout.php">
                    <img src="images/work.jpg" alt="My Workouts" class="image">
                    <div class="overlay" style="background-color: #f72435;">
                        <div class="text">
                        Get all prepped up! Whether it is a stretch day or you feel like going high intensity, we have got you covered in all areas.
                        </div>
                    </div>
                    </a>
                </div>
                <div class="container">
                    <a href="meditate.php">
                    <img src="images/medi.jpg" alt="Meditation" class="image">
                    <div class="overlay" style="background-color: #633103;">
                        <div class="text">
                        Connect to your inner self with the power of mind training and mind-body connection. Join our sessions or watch life illuminating videos exclusively for you.
                        </div>
                    </div>
                    </a>
                </div>
                <div class="container" >
                    <a href="todolist.php">
                    <img src="images/todo.jpg" alt="To-Do List" class="image">
                    <div class="overlay" style="background-color: #3fcc52;">
                        <div class="text">
                        Free up your mental space. Regain clarity and calmness by getting all those tasks out of your head and onto your to-do list, digitally!
                        </div>
                    </div>
                    </a>
                </div>
            </div> 

       <footer >
            <div class="footer" align="center">
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