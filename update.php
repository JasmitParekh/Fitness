<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$task = $description = $spriority = "";
$task_err = $description_err = $priority_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate Task
    $input_task = trim($_POST["task"]);
    if(empty($input_task)){
        $task_err = "Please enter a Task.";
    } elseif(!filter_var($input_task, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $task_err = "Please enter a valid task.";
    } else{
        $task = $input_task;
    }
    
    // Validate Description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";     
    } else{
        $description = $input_description;
    }
    
    // Validate Priority value
    $input_priority = trim($_POST["priority"]);
    if(empty($input_priority)){
        $priority_err = "Please enter the task priority value.";     
    } elseif(!ctype_digit($input_priority)){
        $priority_err = "Please enter a positive integer value.";
    } else{
        $priority = $input_priority;
    }
    
    // Check input errors before inserting in database
    if(empty($task_err) && empty($description_err) && empty($priority_err)){
        // Prepare an update statement
        $sql = "UPDATE todolist SET task=?, description=?, priority=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters. sssi means three are string and one is an integer value
            mysqli_stmt_bind_param($stmt, "sssi", $param_task, $param_description, $param_priority, $param_id);
            
            // Set parameters
            $param_task = $task;
            $param_description = $description;
            $param_priority = $priority;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: todolist.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM todolist WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $task = $row["task"];
                    $description = $row["description"];
                    $priority = $row["priority"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Update Task
        </title>
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <style>
            body{
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
            .form-group{
                background:whitesmoke;
                color:black;
                padding:10px;
                box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
                margin-bottom:10px;
            }
            .form-group label{
                font-weight:bold;
                color:orange;
            }
            .form-control{
                width:100%;
            }
            .btn {
                border: none;
                background:black;
                color:white;
                outline: 0;
                display: inline-block;
                padding: 4px;
                text-align: center;
                cursor: pointer;
                width: 48.5%;
                height:10%;
            }
            a{
                text-decoration:none;
            }
            .btn:hover {
                background-color: #555;
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
                <h2>Update Task Details</h2>
            </div>
            <p>Please Edit the input values and Submit to Update your To-Do Task.</p>
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                <div class="form-group <?php echo (!empty($task_err)) ? 'has-error' : ''; ?>">
                    <label>Task</label>
                    <input type="text" name="task" class="form-control" value="<?php echo $task; ?>">
                    <span class="help-block"><?php echo $task_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                    <label>Description </label>
                    <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                    <span class="help-block"><?php echo $description_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($priority_err)) ? 'has-error' : ''; ?>">
                    <label>Priority</label>
                    <input type="text" name="priority" class="form-control" value="<?php echo $priority; ?>">
                    <span class="help-block"><?php echo $priority_err;?></span>
                </div>
                <br>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn " value="Submit">
                <a href="todolist.php" class="btn" style="font-size:11px;">Cancel</a>
            </form>
        </div>


        <br>
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