<?php 
include 'connection.php';
session_start(); 

if (!isset($_SESSION['id'])) {
?>
    <script type="text/javascript">
        alert("You must Log-In First");
        window.location = "index.php";
    </script>
<?php
} else {
    $id = $_SESSION['id'];
    $query = mysqli_query($db, "SELECT * FROM user WHERE user_id='$id'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);

    // Check if $row is not null before accessing its elements
    if(!$row) {
        echo "User data not found.";
    }
}              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" />
    <!--<link rel="stylesheet" type="text/css" href="css/common.css">-->
    <style>
        body {
            background: url("images/pr.jpg") no-repeat center center fixed;
            background-size: cover; 
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .profile {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            border-radius: 10px;
            padding: 30px;
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .profile h1 {
            color: orange;
            font-family: "Sedan", serif;
            margin-bottom: 20px;
            text-align: center; /* Center align the heading */
            font-style: italic;
        }
        .profile h3 {
            color: orangered;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td {
            padding: 10px;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            background-color: orange;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
    <div class="profile">
        <form method="post" action="#">
            <h1>USER PROFILE</h1>
            <h3>Please fill out the fields and click 'Submit' to update your account details.</h3>
            <table>
                <tr>
                    <td>
                        <label>Full Name</label><br>
                        <input type="text" name="fname" pattern="[a-zA-Z .]+" placeholder="Enter your Fullname" value="<?php echo isset($row['full_name']) ? $row['full_name'] : ''; ?>" required>
                    </td> 
                    <td>
                        <label>Gender</label><br>
                        <input type="text" name="gender" pattern="[a-zA-Z .]+" placeholder="Enter your Gender" required value="<?php echo isset($row['gender']) ? $row['gender'] : ''; ?>">
                    </td> 
                    <td>
                        <label>Date of Birth</label><br>
                        <input type="date" name="dob" placeholder="Enter your Date of Birth" value="<?php echo isset($row['birthdate']) ? $row['birthdate'] : ''; ?>">
                    </td> 
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Address</label><br>
                        <input type="text" name="address" required placeholder="Enter your Address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>">
                    </td> 
                    <td>
                        <label>Email</label><br>
                        <input type="text" name="email" pattern="\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+" placeholder="Format: xyz@gmail.com" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" name="Reset" value="Reset">
                    </td>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])) {
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $query = "UPDATE user SET full_name = '$fullname', gender = '$gender',birthdate = '$dob',  address = '$address',email = '$email'
            WHERE user_id = '$id'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <script type="text/javascript">
        alert("Your details have been updated Successfully!");
        window.location = "homepage.html";
    </script>
    <?php
    }              
    ?>
</body>
</html>

