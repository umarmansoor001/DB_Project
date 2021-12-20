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
    if(isset($_POST["sign_in"]))
    {
        $username=$_POST["Username"];
        $passcode=$_POST["password"];
        //making of query to insert student's data into student table
            $query="SELECT s_id FROM sign_up WHERE sign_up.username = '$username' AND sign_up.passcode = '$passcode';";
            //setting data into student's tables
            $result = mysqli_query($con,$query);
            $student=mysqli_fetch_assoc($result);
            $sid = $student["s_id"];
            $query="SELECT * FROM student WHERE ID = '$sid';";
            //setting data into student's tables
            $result = mysqli_query($con,$query);
            $student=mysqli_fetch_assoc($result);
        echo "<h1>Students Info</h1>";
        echo "Student Name ".$student["firstName"]. " ".$student["lastName"];
    }
        $con->close();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {text-align: center;}    
        </style>
</head>
<body>
    <body style="background-color:powderblue;">
    <h1>Hamaray Bachay Education Trust</h1>
    <h1>Student Accompanying Form</h1>
    <h2>Student Information</h2>
    <h2>Guardian must be Female</h2>
    <form action="accompany.php" method="POST">
        Guardian name : <input type="text" name="Guardian_Name" />
        Contact Number:<input type="text" name="Guardian_Contact"  /><br /><br><br>
        CNIC Number:<input type="text" name="Guardian_CNIC"  />
        Address:<input type="address" name="Guardian_Address"  /><br /><br>
        <p>Gender:</p>
        <input type="radio" name="gender" value="female" /> Female<br />
        Relation:<input type="text" name="Relation"  /><br /><br>
        <input type="Submit" name="female_guardian" value="Submit">
</form>
</body>
</html>