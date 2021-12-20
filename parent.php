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
    //Stroing students username and password in sign_up table
    $query="UPDATE `sign_up` SET s_id = (SELECT ID FROM student ORDER BY ID DESC LIMIT 1) WHERE s_id IS NULL;";
    //setting data into student's tables
    $result = mysqli_query($con,$query);
    if(isset($_POST["button"]))
    {
        $fname=$_POST["First_Name"];
        $lname=$_POST["Last_Name"];
        $gender=$_POST["gender"]; 
        //$DOB=$_POST["DOB"];
        $DOB=date('Y-m-d', strtotime($_POST["DOB"]));
        //Age calculator    
        $dob = date("Y-m-d",strtotime($DOB));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        $age = $diff->y;
        //making of query to insert student's data into student table
        if($age>2 && $age<15)
        {    
            $query="INSERT INTO `student`(firstName,lastName,gender,dateofbirth,Age) VALUES('$fname','$lname','$gender','$DOB','$age');";
            //setting data into student's tables
            $result = mysqli_query($con,$query);
        }
        else
            echo "You Are Not Eligible";
       
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
    <h1>Parents Information</h1><hr>
    <h2>Mother Information</h2>
    <br>
    <form method="POST" action="registration.php">
        Mother's name : <input type="text" name="Mother_Name" />
        Contact Number:<input type="text" name="Mother_Contact"  /><br /><br><br>
        CNIC Number:<input type="text" name="Mother_CNIC"  />
        Email:<input type="email" name="Mother_Email"  /><br /><br><br>
        Address:<input type="address" name="Mother_Address"  /><br /><br>
        <hr>
        <h2>Father Information</h2>
        Fathers's name : <input type="text" name="Father_Name" />
        Contact Number:<input type="text" name="Father_Contact"  /><br /><br><br>
        CNIC Number:<input type="text" name="Father_CNIC"  />
        Email:<input type="email" name="Father_Email"  /><br /><br><br>
        Address:<input type="address" name="Father_Address"  /><br /><br>
        <input type="Submit" name="button_done" value="Go Next">
        
    </form>
    <form method="POST" action="guardian.php">
        <hr>
        <h2>In case if Father is not Alive Or Living abroad Then also provide Guardian's Information</h2>
        <input type="Submit" name="button_guardian" value="Go Next">
    </form>
</body>
</html>



