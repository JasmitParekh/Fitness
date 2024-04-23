<?php 
include 'connection.php';
  session_start(); 
  //accessible to only logged in users.
  if (!isset($_SESSION['id'])) {
?>

    <script type="text/javascript">
      alert("You must Log-In First");
      window.location = "index.php";
    </script>
    
<?php
  }else{
    $id=$_SESSION['id'];
    $query=mysqli_query($db,"SELECT * FROM user where user_id='$id'")or die(mysqli_error());
    $row=mysqli_fetch_array($query);
  }              
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            To-Do List
        </title>
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <style>
            body{
                background:url("images/Todolist.jpeg");
                background-size: cover; 
                margin:0;
            }
            body>div{   
                padding:1%;
            }  
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
                padding:10px;
                background: beige;
                box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
            }
            .page-header a{
                background:black;
                color:white;
                padding:5px;
                text-decoration:none;
            }
            table tr td:last-child a{
                margin-right: 4px;
                background:black;
                text-decoration:none;
                padding: 6px;
                text-align: center;
                cursor: pointer;
                width: 50%;
                border-radius:3px;
                color:orange;
            }
            table tr td:last-child a:hover{
                background:#555;
            }
            table th{
                border:1;
                background:beige;
                padding:10px;
                spacing:10px;
                box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
            }
            table tr td{
                border:1;
                background:whitesmoke;
                color:black;
                padding:10px;
                spacing:10px;
                box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
            }
            .btn {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 4px;
                text-align: center;
                cursor: pointer;
                width: 50%;
            }

            .btn:hover {background-color: #555;}
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
                        <a href="member.php">Dashboard</a> 
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
        </header>
        <nav>
            <div id="navigation">
                <a href="homepage.html">Home</a>
                <a href="health.html">Healthy Living</a>
                <a href="faq.html">FAQ</a>
                <a href="contactus.html">Contact Us</a>
                <a href="help.php">Help</a>
                <a href="member.php">Member's Area</a>
            </div>
        </nav>

        <div class="wrapper">
            <div class="page-header">
                <h2>Daily Activity Planner</h2>
                <center><a href="create.php" class="btn " >Add New Activity</a></center>
            </div>
            <br>
            <?php
            // Include config file
            require_once "config.php";
            
            // Select query from the database
            $sql = "SELECT * FROM todolist";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table '>  ";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>S.No. </th>";
                                echo "<th>Task </th>";
                                echo "<th>Description </th>";
                                echo "<th>Priority </th>";
                                echo "<th>Action </th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['task'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['priority'] . "</td>";
                                echo "<td>";
                                    echo "<a href='read.php?id=". $row['id'] ."' title='View Task' data-toggle='tooltip'>View</a>";
                                    echo "<a href='update.php?id=". $row['id'] ."' title='Update Task' data-toggle='tooltip'>Update</a>";
                                    echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Task' data-toggle='tooltip'>Delete</a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            // Close connection
            mysqli_close($link);
            ?>
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