<!-- managing guardian data -->
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
    //when button pressed then this part runs
    if(isset($_POST["female_guardian"]))
    {
        //Guardian's data
        $name=$_POST["Guardian_Name"];
        $contact=$_POST["Guardian_Contact"];
        $cnic=$_POST["Guardian_CNIC"];
        $address=$_POST["Guardian_Address"];
        $gender=$_POST["gender"];
        $relation=$_POST["Relation"];

        //making of query to insert student's data into student table
        $query="INSERT INTO `guardian`(G_Name,G_address,G_contactNo,G_cnic,G_gender,G_relationship) VALUES('$name','$address','$contact','$cnic','$gender','$relation');";
       //setting data into student's tables
        mysqli_query($con,$query);
        //Now adding student_id and and guardian_id in care table 
        $query="INSERT INTO care() SELECT student.ID, guardian.G_ID FROM student, guardian WHERE student.ID = (SELECT ID FROM student ORDER BY ID DESC LIMIT 1) AND guardian.G_ID = (SELECT guardian.G_ID FROM guardian ORDER BY guardian.G_ID DESC LIMIT 1);";
        mysqli_query($con,$query);
    }
        $con->close();
    ?>