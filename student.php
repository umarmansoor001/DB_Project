<!-- First saving student's data in student's table -->
<?php  // creating a database connection 

    $server="localhost";
    $login="root";
    $password="";
    $db="hamareybachchey";
    $con = mysqli_connect($server,$login,$password,$db);

    if(mysqli_connect_error())
    {
        echo "Connection failed ";
        exit();
    }
    //if button pressed then this part runs
    if(isset($_POST["sign_up"]))
    {
        $username=$_POST["Username"];
        $passcode=$_POST["password"];
        //making of query to insert student's data into student table
            $query="INSERT INTO `sign_up`(username,passcode) VALUES('$username','$passcode');";
            //setting data into student's tables
            $result = mysqli_query($con,$query);
       
    }
        $con->close();
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
h1 {text-align: center;}    
</style>
</head>
<title>Student></title>
<body>
    <body style="background-color:powderblue;">
    <h1>Hamaray Bachay Education Trust</h1>
    <h1>Admisiion Form</h1>
    <h2>Enter Student Information</h2>
    <form method="POST" action="parent.php" >
        First name:<input type="text" name="First_Name" placeholder="Enter first Name" autocomplete="off" /><br />
        Last name:<input type="text" name="Last_Name" placeholder="Enter last Name" autocomplete="off"/><br />
    <p>Date of birth:</p>
    <input type="text" name="DOB" placeholder="yyyy-mm-dd" autocomplete="off">
    <p>Gender:</p>
    <input type="radio" name="gender" value="male" /> Male<br />
    <input type="radio" name="gender" value="female" /> Female<br />
    <input type="Submit" name="button" value="Go Next">
    
    </form>
</body>
</html>




